$(function() {
    get_proposal_comments();
    $('body').on('click', '.dismiss-proposal-convert-modal', function(e) {
        e.preventDefault();
        $('body').find('.proposal-convert-modal').modal('hide');
    });
});

function init_proposal_editor() {

    tinymce.remove('div.editable');

    var _templates = [];

    $.each(proposalsTemplates, function(i, template) {
        _templates.push({
            url: admin_url + 'proposals/get_template?name=' + template,
            title: template
        });
    });

    var settings = {
        selector: 'div.editable',
        inline: true,
        theme: 'inlite',
        // skin: 'perfex',
        relative_urls: false,
        remove_script_host: false,
        inline_styles: true,
        verify_html: false,
        cleanup: false,
        apply_source_formatting: false,
        valid_elements: '+*[*]',
        valid_children: "+body[style], +style[type]",
        file_browser_callback: elFinderBrowser,
        table_default_styles: {
            width: '100%'
        },
        fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
        pagebreak_separator: '<p pagebreak="true"></p>',
        plugins: [
            'advlist pagebreak autolink autoresize lists link image charmap hr',
            'searchreplace visualblocks visualchars code',
            'media nonbreaking table contextmenu',
            'paste textcolor colorpicker'
        ],
        autoresize_bottom_margin: 50,
        insert_toolbar: 'image media quicktable | bullist numlist | h2 h3 | hr',
        selection_toolbar: 'save_button bold italic underline superscript | forecolor backcolor link | alignleft aligncenter alignright alignjustify | fontselect fontsizeselect h2 h3',
        contextmenu: "image media inserttable | cell row column deletetable | paste pastetext searchreplace | visualblocks pagebreak charmap | code",
        setup: function(editor) {

            editor.addCommand('mceSave', function() {
                save_proposal_content(true);
            });

            editor.addShortcut('Meta+S', '', 'mceSave');

            editor.on('MouseLeave blur', function() {
                if (tinymce.activeEditor.isDirty()) {
                    save_proposal_content();
                }
            });

            editor.on('MouseDown ContextMenu', function() {
                if (!is_mobile() && !$('#small-table').hasClass('hide')) {
                    small_table_full_view();
                }
            });

            editor.on('blur', function() {
                $.Shortcuts.start();
            });

            editor.on('focus', function() {
                $.Shortcuts.stop();
            });
        },
    };

    if (is_mobile()) {

        settings.theme = 'modern';
        settings.mobile = {};
        settings.mobile.theme = 'mobile';
        settings.mobile.toolbar = _tinymce_mobile_toolbar();

        settings.inline = false;

        window.addEventListener("beforeunload", function(event) {
            if (tinymce.activeEditor.isDirty()) {
                save_proposal_content();
            }
        });
    }

    if (_templates.length > 0) {
        settings.templates = _templates;
        settings.plugins[3] = 'template ' + settings.plugins[3];
        settings.contextmenu = settings.contextmenu.replace('inserttable', 'inserttable template')
    }

    tinymce.init(settings);
}

function add_proposal_comment() {
    var comment = $('#comment').val();
    if (comment == '') { return; }
    var data = {};
    data.content = comment;
    data.proposalid = proposal_id;
    $('body').append('<div class="dt-loader"></div>');
    $.post(admin_url + 'proposals/add_proposal_comment', data).done(function(response) {
        response = JSON.parse(response);
        $('body').find('.dt-loader').remove();
        if (response.success == true) {
            $('#comment').val('');
            get_proposal_comments();
        }
    });
}

function get_proposal_comments() {
    if (typeof(proposal_id) == 'undefined') { return; }
    requestGet('proposals/get_proposal_comments/' + proposal_id).done(function(response) {
        $('body').find('#proposal-comments').html(response);
    });
}

function remove_proposal_comment(commentid) {
    if (confirm_delete()) {
        requestGetJSON('proposals/remove_comment/' + commentid).done(function(response) {
            if (response.success == true) {
                $('[data-commentid="' + commentid + '"]').remove();
            }
        });
    }
}

function edit_proposal_comment(id) {
    var content = $('body').find('[data-proposal-comment-edit-textarea="' + id + '"] textarea').val();
    if (content != '') {
        $.post(admin_url + 'proposals/edit_comment/' + id, { content: content }).done(function(response) {
            response = JSON.parse(response);
            if (response.success == true) {
                alert_float('success', response.message);
                $('body').find('[data-proposal-comment="' + id + '"]').html(nl2br(content));
            }
        });
        toggle_proposal_comment_edit(id);
    }
}

function toggle_proposal_comment_edit(id) {
    $('body').find('[data-proposal-comment="' + id + '"]').toggleClass('hide');
    $('body').find('[data-proposal-comment-edit-textarea="' + id + '"]').toggleClass('hide');
}

function convert_template(invoker) {
    var template = $(invoker).data('template');
    var html_helper_selector;
    if (template == 'estimate') {
        html_helper_selector = 'estimate';
    } else if (template == 'invoice') {
        html_helper_selector = 'invoice';
    } else {
        return false;
    }

    requestGet('proposals/get_' + html_helper_selector + '_convert_data/' + proposal_id).done(function(data) {
        if ($('.proposal-pipeline-modal').is(':visible')) {
            $('.proposal-pipeline-modal').modal('hide');
        }
        $('#convert_helper').html(data);
        $('#convert_to_' + html_helper_selector).modal({ show: true, backdrop: 'static' });
        reorder_items();
    });

}

function save_proposal_content(manual) {
    var editor = tinyMCE.activeEditor;
    var data = {};
    data.proposal_id = proposal_id;
    data.content = editor.getContent();
    $.post(admin_url + 'proposals/save_proposal_data', data).done(function(response) {
        response = JSON.parse(response);
        if (typeof(manual) != 'undefined') {
            // Show some message to the user if saved via CTRL + S
            alert_float('success', response.message);
        }
        // Invokes to set dirty to false
        editor.save();
    }).fail(function(error) {
        var response = JSON.parse(error.responseText);
        alert_float('danger', response.message);
    });
}
