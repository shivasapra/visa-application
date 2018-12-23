
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/reset.min.css?v=2.1.1')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/plugins/roboto/roboto.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/plugins/app-build/vendor.css?v=2.1.1')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('app/plugins/fullcalendar/fullcalendar.min.css?v=2.1.1')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/style.min.css?v=2.1.1')}}">
            <script>var site_url="http://localhost/crm/",admin_url="http://localhost/crm/admin/",max_php_ini_upload_size_bytes="2097152",google_api="",calendarIDs="",is_admin="1",is_staff_member="1",has_permission_tasks_checklist_items_delete="1",app_language="",app_is_mobile="",app_user_browser="chrome",app_date_format="Y-m-d",app_decimal_places="2",app_scroll_responsive_tables="0",app_company_is_required="1",app_default_view_calendar="month",app_maximum_allowed_ticket_attachments="4",app_show_setup_menu_item_only_on_hover="0",app_calendar_events_limit="4",app_tables_pagination_limit="25",app_newsfeed_maximum_files_upload="10",app_time_format="24",app_decimal_separator=".",app_thousand_separator=",",app_currency_placement="before",app_timezone="Europe/Berlin",app_calendar_first_day="0",app_allowed_files=".png,.jpg,.pdf,.doc,.docx,.xls,.xlsx,.zip,.rar,.txt",app_show_table_export_button="to_all",app_desktop_notifications="0",app_dismiss_desktop_not_after="0";var appLang = {};appLang["invoice_task_billable_timers_found"] = "Started timers found";appLang["validation_extension_not_allowed"] = "File extension not allowed";appLang["tag"] = "Tag";appLang["options"] = "Options";appLang["no_items_warning"] = "Enter at least one item.";appLang["item_forgotten_in_preview"] = "Have you forgotten to add this item?";appLang["email_exists"] = "Email already exists";appLang["new_notification"] = "New Notification!";appLang["estimate_number_exists"] = "This estimate number exists for the ongoing year.";appLang["invoice_number_exists"] = "This invoice number exists for the ongoing year.";appLang["confirm_action_prompt"] = "Are you sure you want to perform this action?";appLang["calendar_expand"] = "expand";appLang["proposal_save"] = "Save Proposal";appLang["contract_save"] = "Save Contract";appLang["media_files"] = "Files";appLang["credit_note_number_exists"] = "Credit note number already exists";appLang["item_field_not_formatted"] = "The number in the input field is not formatted while edit/add item and should remain not formatted do not try to format it manually in here.";appLang["filter_by"] = "Filter by";appLang["you_can_not_upload_any_more_files"] = "You can not upload any more files";appLang["cancel_upload"] = "Cancel Upload";appLang["remove_file"] = "Remove file";appLang["browser_not_support_drag_and_drop"] = "Your browser does not support drag'n'drop file uploads";appLang["drop_files_here_to_upload"] = "Drop files here to upload";appLang["file_exceeds_max_filesize"] = "The uploaded file exceeds the upload_max_filesize directive in php.ini (2 MB)";appLang["file_exceeds_maxfile_size_in_form"] = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form (2 MB)";appLang["unit"] = "Unit";appLang["dt_length_menu_all"] = "All";appLang["dt_button_reload"] = "Reload";appLang["dt_button_excel"] = "Excel";appLang["dt_button_csv"] = "CSV";appLang["dt_button_pdf"] = "PDF";appLang["dt_button_print"] = "Print";appLang["dt_button_export"] = "Export";appLang["search_ajax_empty"] = "Select and begin typing";appLang["search_ajax_initialized"] = "Start typing to search";appLang["search_ajax_searching"] = "Searching...";appLang["not_results_found"] = "No results found";appLang["search_ajax_placeholder"] = "Type to search...";appLang["currently_selected"] = "Currently Selected";appLang["task_stop_timer"] = "Stop Timer";appLang["dt_button_column_visibility"] = "Visibility";appLang["note"] = "Note";appLang["search_tasks"] = "Search Tasks";appLang["confirm"] = "Confirm";appLang["showing_billable_tasks_from_project"] = "Showing billable tasks from project";appLang["invoice_task_item_project_tasks_not_included"] = "Projects tasks are not included in this list.";appLang["credit_amount_bigger_then_invoice_balance"] = "Total credits amount is bigger then invoice balance due";appLang["credit_amount_bigger_then_credit_note_remaining_credits"] = "Total credits amount is bigger then remaining credits";appLang["save"] = "Save";</script>    <script>
        appLang['datatables'] = {"emptyTable":"No entries found","info":"Showing _START_ to _END_ of _TOTAL_ entries","infoEmpty":"Showing 0 to 0 of 0 entries","infoFiltered":"(filtered from _MAX_ total entries)","lengthMenu":"_MENU_","loadingRecords":"Loading...","processing":"<div class=\"dt-loader\"><\/div>","search":"<div class=\"input-group\"><span class=\"input-group-addon\"><span class=\"fa fa-search\"><\/span><\/span>","searchPlaceholder":"Search...","zeroRecords":"No matching records found","paginate":{"first":"First","last":"Last","next":"Next","previous":"Previous"},"aria":{"sortAscending":" activate to sort column ascending","sortDescending":" activate to sort column descending"}};
        var totalUnreadNotifications = 0,
        proposalsTemplates = [],
        contractsTemplates = [],
        availableTags = [],
        availableTagsIds = [],
        billingAndShippingFields = ['billing_street','billing_city','billing_state','billing_zip','billing_country','shipping_street','shipping_city','shipping_state','shipping_zip','shipping_country'],
        locale = 'en',
        isRTL = 'false',
        tinymceLang = '',
        monthsJSON = '["January","February","March","April","May","June","July","August","September","October","November","December"]',
        taskid,taskTrackingStatsData,taskAttachmentDropzone,taskCommentAttachmentDropzone,leadAttachmentsDropzone,newsFeedDropzone,expensePreviewDropzone,taskTrackingChart,cfh_popover_templates = {},_table_api;
    </script>
        <script>
        if (typeof (jQuery) === 'undefined' && !window.deferAfterjQueryLoaded) {
            window.deferAfterjQueryLoaded = [];
            Object.defineProperty(window, "$", {
                set: function (value) {
                    window.setTimeout(function () {
                        $.each(window.deferAfterjQueryLoaded, function (index, fn) {
                            fn();
                        });
                    }, 0);
                    Object.defineProperty(window, "$", {
                        value: value
                    });
                },
                configurable: true
            });
        }

        var csrfData = {"formatted":{"csrf_token_name":"9d809d1311131693b314ca5e910acce9"},"token_name":"csrf_token_name","hash":"9d809d1311131693b314ca5e910acce9"};

        if (typeof(jQuery) == 'undefined') {

            window.deferAfterjQueryLoaded.push(function () {
                csrf_jquery_ajax_setup();
            });
            window.addEventListener('load',function(){
                csrf_jquery_ajax_setup();
            },true);
        } else {
            csrf_jquery_ajax_setup();
        }

        function csrf_jquery_ajax_setup() {
                $.ajaxSetup({
                    data: csrfData.formatted
                });
        }</script>
</head>
<body class="app admin dashboard invoices-total-manual user-id-1 chrome">
  <div id="header">
         <div class="hide-menu"><i class="fa fa-bars"></i></div>
         <div id="logo"></div>
         <nav>
            <div class="small-logo"><span class="text-primary"></span></div>
            <ul class="nav navbar-nav navbar-right">
              <li id="top_search" class="dropdown" data-toggle="tooltip" data-placement="bottom" data-title="Use # + tagname to search by tags">
              <input type="search" id="search_input" class="form-control" placeholder="Search...">
              <div id="search_results"></div>
              </li>
              <li id="top_search_button">
                 <button class="btn"><i class="fa fa-search"></i></button>
              </li>
              <li class="icon header-user-profile" data-toggle="tooltip" title="" data-placement="bottom">
                  <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="false">
                  <img src="{{asset('app/images/user-placeholder.jpg')}}" class="img img-responsive staff-profile-image-small pull-left" alt="" />
                </a>
                  <ul class="dropdown-menu animated fadeIn">
                     <li class="header-my-profile"><a href="">My Profile</a></li>
                     <li class="header-logout">
                        <a class="dropdown-item" href="{{ route('home') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                      </a>
                                  
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                     </li>
                  </ul>
              </li>
            </div>
  <aside id="menu" class="sidebar">
    <ul class="nav metis-menu" id="side-menu">
      <li class="dashboard_user">
       Welcome {{ Auth::user()->name }} <i class="fa fa-power-off top-left-logout pull-right" data-toggle="tooltip" data-title="Logout" data-placement="right" 
       onclick="event.preventDefault();document.getElementById('logout-form').submit();"></i>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
      </li>
      <li class="quick-links">
       <div class="dropdown dropdown-quick-links">
          <a href="#" class="dropdown-toggle" id="dropdownQuickLinks" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <i class="fa fa-gavel" aria-hidden="true"></i>
          </a>
          {{-- <ul class="dropdown-menu" aria-labelledby="dropdownQuickLinks">
                            <li>
                <a href="http://localhost/crm/admin/invoices/invoice" >
                <i class="fa fa-plus-square-o"></i>
                Invoice</a>
             </li>
                            <li>
                <a href="http://localhost/crm/admin/estimates/estimate" >
                <i class="fa fa-plus-square-o"></i>
                Estimate</a>
             </li>
                            <li>
                <a href="http://localhost/crm/admin/proposals/proposal" >
                <i class="fa fa-plus-square-o"></i>
                Proposal</a>
             </li>
                            <li>
                <a href="http://localhost/crm/admin/credit_notes/credit_note" >
                <i class="fa fa-plus-square-o"></i>
                Credit Note</a>
             </li>
                            <li>
                <a href="http://localhost/crm/admin/clients/client" >
                <i class="fa fa-plus-square-o"></i>
                Customer</a>
             </li>
                            <li>
                <a href="http://localhost/crm/admin/subscriptions/create" >
                <i class="fa fa-plus-square-o"></i>
                Subscription</a>
             </li>
                            <li>
                <a href="http://localhost/crm/admin/projects/project" >
                <i class="fa fa-plus-square-o"></i>
                Project</a>
             </li>
                            <li>
                <a href="#" onclick="new_task();return false;">
                <i class="fa fa-plus-square-o"></i>
                Task</a>
             </li>
                            <li>
                <a href="#" onclick="init_lead(); return false;">
                <i class="fa fa-plus-square-o"></i>
                Lead</a>
             </li>
                            <li>
                <a href="http://localhost/crm/admin/expenses/expense" >
                <i class="fa fa-plus-square-o"></i>
                Expense</a>
             </li>
                            <li>
                <a href="http://localhost/crm/admin/contracts/contract" >
                <i class="fa fa-plus-square-o"></i>
                Contract</a>
             </li>
                            <li>
                <a href="http://localhost/crm/admin/goals/goal" >
                <i class="fa fa-plus-square-o"></i>
                Goal</a>
             </li>
                            <li>
                <a href="http://localhost/crm/admin/knowledge_base/article" >
                <i class="fa fa-plus-square-o"></i>
                Article</a>
             </li>
                            <li>
                <a href="http://localhost/crm/admin/surveys/survey" >
                <i class="fa fa-plus-square-o"></i>
                Survey</a>
             </li>
                            <li>
                <a href="http://localhost/crm/admin/tickets/add" >
                <i class="fa fa-plus-square-o"></i>
                Ticket</a>
             </li>
                            <li>
                <a href="http://localhost/crm/admin/staff/member" >
                <i class="fa fa-plus-square-o"></i>
                Staff Member</a>
             </li>
                            <li>
                <a href="http://localhost/crm/admin/utilities/calendar?new_event=true&date=2018-12-23" >
                <i class="fa fa-plus-square-o"></i>
                Event</a>
             </li>
                         </ul> --}}
       </div>
      </li>

      <li class="menu-item-dashboard">
        <a href="" aria-expanded="false">
          <i class="fa fa-tachometer menu-icon"></i>
          Dashboard </a>
      </li>
      <li class="menu-item-customers">
        <a href="" aria-expanded="false"><i class="fa fa-user-o menu-icon"></i>
        Agents</a>
      </li>
      <li class="menu-item-leads">
        <a href=" aria-expanded="false"><i class="fa fa-tty menu-icon"></i>
        Leads</a>
      </li>    
      <li class="menu-item-customers">
        <a href="" aria-expanded="false"><i class="fa fa-user-o menu-icon"></i>
        Students</a>
      </li>
      <li class="menu-item-dashboard">
        <a href="" aria-expanded="false">
        <i class="fa fa-tachometer menu-icon"></i>
        File Progress  </a>
      </li>
      <li class="menu-item-dashboard">
        <a href="" aria-expanded="false">
        <i class="fa fa-tachometer menu-icon"></i>
        Visa Status </a>
      </li>
      <li class="menu-item-dashboard">
        <a href="" aria-expanded="false">
        <i class="fa fa-tachometer menu-icon"></i>
        Offer letter status </a>
      </li>
      <li class="menu-item-knowledge-base">
        <a href="" aria-expanded="false"><i class="fa fa-folder-open-o menu-icon"></i>
        Accepted Letter</a>
      </li>
    </ul>
  </aside>

  <div id="wrapper">
      @yield('content')
  </div>




  <script src="{{asset('app/plugins/app-build/vendor.js?v=2.1.1')}}"></script>
  <script src="{{asset('app/plugins/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('app/plugins/datatables/datatables.min.js?v=2.1.1')}}"></script>
  <script src="{{asset('app/plugins/app-build/moment.min.js')}}"></script>
  <script src='{{asset('app/plugins/app-build/bootstrap-select.min.js?v=2.')}}1.1'></script>
  <script src="{{asset('app/plugins/tinymce/tinymce.min.js?v=2.1.1')}}"></script>
  <script src="{{asset('app/plugins/jquery-validation/jquery.validate.min.js?v=2.1.1')}}"></script>
  <script src="{{asset('app/plugins/fullcalendar/fullcalendar.min.js?v=2.1.1')}}"></script>
  <script src="{{asset('app/js/main.min.js?v=2.1.1')}}"></script>

  //Scripts
  <script>
          function custom_fields_hyperlink(){
           var cf_hyperlink = $('body').find('.cf-hyperlink');
           if(cf_hyperlink.length){
               $.each(cf_hyperlink,function(){
                  var cfh_wrapper = $(this);
                  var cfh_field_to = cfh_wrapper.attr('data-fieldto');
                  var cfh_field_id = cfh_wrapper.attr('data-field-id');
                  var textEl = $('body').find('#custom_fields_'+cfh_field_to+'_'+cfh_field_id+'_popover');
                  var hiddenField = $("#custom_fields\\\["+cfh_field_to+"\\\]\\\["+cfh_field_id+"\\\]");
                  var cfh_value = cfh_wrapper.attr('data-value');
                  hiddenField.val(cfh_value);

                  if($(hiddenField.val()).html() != ''){
                      textEl.html($(hiddenField.val()).html());
                  }
                  var cfh_field_name = cfh_wrapper.attr('data-field-name');
                  textEl.popover({
                      html: true,
                      trigger: "manual",
                      placement: "top",
                      title:cfh_field_name,
                      content:function(){
                          return $(cfh_popover_templates[cfh_field_id]).html();
                      }
                  }).on("click", function(e){
                      var $popup = $(this);
                      $popup.popover("toggle");
                      var titleField = $("#custom_fields_"+cfh_field_to+"_"+cfh_field_id+"_title");
                      var urlField = $("#custom_fields_"+cfh_field_to+"_"+cfh_field_id+"_link");
                      var ttl = $(hiddenField.val()).html();
                      var cfUrl = $(hiddenField.val()).attr("href");
                      if(cfUrl){
                          $('#cf_hyperlink_open_'+cfh_field_id).attr('href',(cfUrl.indexOf('://') === -1 ? 'http://' + cfUrl : cfUrl));
                      }
                      titleField.val(ttl);
                      urlField.val(cfUrl);
                      $("#custom_fields_"+cfh_field_to+"_"+cfh_field_id+"_btn-save").click(function(){
                          hiddenField.val((urlField.val() != '' ? '<a href="'+urlField.val()+'" target="_blank">' + titleField.val() + '</a>' : ''));
                          textEl.html(titleField.val() == "" ? "Click here to add link" : titleField.val());
                          $popup.popover("toggle");
                      });
                      $("#custom_fields_"+cfh_field_to+"_"+cfh_field_id+"_btn-cancel").click(function(){
                          if(urlField.val() == ''){
                              hiddenField.val('');
                          }
                          $popup.popover("toggle");
                      });
                  });
              });
           }}
  </script>
    <div class="modal fade _event" id="newEventModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add new event</h4>
        </div>
        <form action="http://localhost/crm/admin/utilities/calendar" id="calendar-event-form" method="post" accept-charset="utf-8">
    <input type="hidden" name="csrf_token_name" value="9d809d1311131693b314ca5e910acce9" />                                                                   
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group" app-field-wrapper="title"><label for="title" class="control-label">Event title</label><input type="text" id="title" name="title" class="form-control"  value=""></div>            <div class="form-group" app-field-wrapper="description"><label for="description" class="control-label">Description</label><textarea id="description" name="description" class="form-control" rows="5"></textarea></div>            <div class="form-group" app-field-wrapper="start"><label for="start" class="control-label">Start Date</label><div class="input-group date"><input type="text" id="start" name="start" class="form-control datetimepicker"  value=""><div class="input-group-addon">
      <i class="fa fa-calendar calendar-icon"></i>
    </div></div></div>            <div class="clearfix mtop15"></div>
              <div class="form-group" app-field-wrapper="end"><label for="end" class="control-label">End Date</label><div class="input-group date"><input type="text" id="end" name="end" class="form-control datetimepicker"  value=""><div class="input-group-addon">
      <i class="fa fa-calendar calendar-icon"></i>
    </div></div></div>            <div class="form-group">
               <div class="row">
                <div class="col-md-12">
                  <label for="reminder_before">Notification</label>
                </div>
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="number" class="form-control" name="reminder_before" value="30" id="reminder_before">
                    <span class="input-group-addon"><i class="fa fa-question-circle" data-toggle="tooltip" data-title="Eq. 30 minutes before"></i></span>
                  </div>
                </div>
                <div class="col-md-6">
                 <select name="reminder_before_type" id="reminder_before_type" class="selectpicker" data-width="100%">
                   <option value="minutes" selected>Minutes</option>
                   <option value="hours">Hours</option>
                   <option value="days">Days</option>
                   <option value="weeks">Weeks</option>
                 </select>
               </div>
             </div>
           </div>
           <hr />
           <p class="bold">Event Color</p>
           <div class="cpicker-wrapper"><div class='calendar-cpicker cpicker cpicker-big' data-color='#28B8DA' style='background:#28B8DA;border:1px solid #28B8DA'></div><div class='calendar-cpicker cpicker cpicker-small' data-color='#03a9f4' style='background:#03a9f4;border:1px solid #03a9f4'></div><div class='calendar-cpicker cpicker cpicker-small' data-color='#c53da9' style='background:#c53da9;border:1px solid #c53da9'></div><div class='calendar-cpicker cpicker cpicker-small' data-color='#757575' style='background:#757575;border:1px solid #757575'></div><div class='calendar-cpicker cpicker cpicker-small' data-color='#8e24aa' style='background:#8e24aa;border:1px solid #8e24aa'></div><div class='calendar-cpicker cpicker cpicker-small' data-color='#d81b60' style='background:#d81b60;border:1px solid #d81b60'></div><div class='calendar-cpicker cpicker cpicker-small' data-color='#0288d1' style='background:#0288d1;border:1px solid #0288d1'></div><div class='calendar-cpicker cpicker cpicker-small' data-color='#7cb342' style='background:#7cb342;border:1px solid #7cb342'></div><div class='calendar-cpicker cpicker cpicker-small' data-color='#fb8c00' style='background:#fb8c00;border:1px solid #fb8c00'></div><div class='calendar-cpicker cpicker cpicker-small' data-color='#84C529' style='background:#84C529;border:1px solid #84C529'></div><div class='calendar-cpicker cpicker cpicker-small' data-color='#fb3b3b' style='background:#fb3b3b;border:1px solid #fb3b3b'></div></div>
    <input type="hidden" name="color" value="#28B8DA" />
          <div class="clearfix"></div>
          <hr />
          <div class="checkbox checkbox-primary">
            <input type="checkbox" name="public" id="public">
            <label for="public">Public Event</label>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-info">Save</button>
    </div>
    </form></div><!-- /.modal-content -->
    </div><!-- /.modal-dialog --></div><!-- /.modal -->
  <script>
      var weekly_payments_statistics;
      var user_dashboard_visibility = [{"id":"top_stats","visible":"0"},{"id":"finance_overview","visible":"0"},{"id":"user_data","visible":"0"},{"id":"calendar","visible":"0"},{"id":"weekly_payments_chart","visible":"0"},{"id":"todos","visible":"0"},{"id":"leads_chart","visible":"0"},{"id":"projects_chart","visible":"0"},{"id":"projects_activity","visible":"0"}];
      $(function() {
          $( "[data-container]" ).sortable({
              connectWith: "[data-container]",
              helper:'clone',
              handle:'.widget-dragger',
              tolerance:'pointer',
              forcePlaceholderSize: true,
              placeholder: 'placeholder-dashboard-widgets',
              start:function(event,ui) {
                  $("body,#wrapper").addClass('noscroll');
                  $('body').find('[data-container]').css('min-height','20px');
              },
              stop:function(event,ui) {
                  $("body,#wrapper").removeClass('noscroll');
                  $('body').find('[data-container]').removeAttr('style');
              },
              update: function(event, ui) {
                  if (this === ui.item.parent()[0]) {
                      var data = {};
                      $.each($("[data-container]"),function(){
                          var cId = $(this).attr('data-container');
                          data[cId] = $(this).sortable('toArray');
                          if(data[cId].length == 0) {
                              data[cId] = 'empty';
                          }
                      });
                      $.post(admin_url+'staff/save_dashboard_widgets_order', data, "json");
                  }
              }
          });

          $('body').on('click','#viewWidgetableArea',function(e){
              e.preventDefault();

              if(!$(this).hasClass('preview')) {
                  $(this).html("Hide Widgetable Area");
                  $('[data-container]').append('<div class="placeholder-dashboard-widgets pl-preview"></div>');
              } else {
                  $(this).html("View Widgetable Area");
                  $('[data-container]').find('.pl-preview').remove();
              }

              $('[data-container]').toggleClass('preview-widgets');
              $(this).toggleClass('preview');
          });

          var $widgets = $('.widget');
          var widgetsOptionsHTML = '';
          widgetsOptionsHTML += '<div id="dashboard-options">';
          widgetsOptionsHTML += "<h4><i class='fa fa-question-circle' data-toggle='tooltip' data-placement=\"bottom\" data-title=\"Widgets that are shown only if they have enough data do not have options to be hidden or shown.\"></i> Widgets</h4><a href=\"http://localhost/crm/admin/staff/reset_dashboard\">Reset Dashboard</a>";

          widgetsOptionsHTML += ' | <a href=\"#\" id="viewWidgetableArea">View Widgetable Area</a>';
          widgetsOptionsHTML += '<hr class=\"hr-10\">';

          $.each($widgets,function(){
              var widget = $(this);
              var widgetOptionsHTML = '';
              if(widget.data('name') && widget.html().trim().length > 0) {
                  widgetOptionsHTML += '<div class="checkbox checkbox-inline">';
                  var wID = widget.attr('id');
                  wID = wID.split('widget-');
                  wID = wID[wID.length-1];
                  var checked= ' ';
                  var db_result = $.grep(user_dashboard_visibility, function(e){ return e.id == wID; });
                  if(db_result.length >= 0) {
                      // no options saved or really visible
                      if(typeof(db_result[0]) == 'undefined' || db_result[0]['visible'] == 1) {
                          checked = ' checked ';
                      }
                  }
                  widgetOptionsHTML += '<input type="checkbox" class="widget-visibility" value="'+wID+'"'+checked+'id="widget_option_'+wID+'" name="dashboard_widgets['+wID+']">';
                  widgetOptionsHTML += '<label for="widget_option_'+wID+'">'+widget.data('name')+'</label>';
                  widgetOptionsHTML += '</div>';
              }
              widgetsOptionsHTML += widgetOptionsHTML;
          });

          $('.screen-options-area').append(widgetsOptionsHTML);
          $('body').find('#dashboard-options input.widget-visibility').on('change',function(){
            if($(this).prop('checked') == false) {
              $('#widget-'+$(this).val()).addClass('hide');
          } else {
              $('#widget-'+$(this).val()).removeClass('hide');
          }

          var data = {};
          var options = $('#dashboard-options input[type="checkbox"]').map(function() {
              return { id: this.value, visible: this.checked ? 1 : 0 };
          }).get();

          data.widgets = options;/*if (typeof(csrfData) !== 'undefined') {
      data[csrfData['token_name']] = csrfData['hash'];}*/
          $.post(admin_url+'staff/save_dashboard_widgets_visibility',data).fail(function(data) {
              // Demo usage, prevent multiple alerts
              if($('body').find('.float-alert').length == 0) {
                  alert_float('danger', data.responseText);
              }
          });});

          var tickets_chart_departments = $('#tickets-awaiting-reply-by-department');
          var tickets_chart_status = $('#tickets-awaiting-reply-by-status');
          var leads_chart = $('#leads_status_stats');
          var projects_chart = $('#projects_status_stats');

          if (tickets_chart_departments.length > 0) {
              // Tickets awaiting reply by department chart
              var tickets_dep_chart = new Chart(tickets_chart_departments, {
                  type: 'doughnut',
                  data: {"labels":[],"datasets":[{"data":[],"backgroundColor":[],"hoverBackgroundColor":[]}]},
              });
          }
          if (tickets_chart_status.length > 0) {
              // Tickets awaiting reply by department chart
              new Chart(tickets_chart_status, {
                  type: 'doughnut',
                  data: {"labels":[],"datasets":[{"data":[],"backgroundColor":[],"hoverBackgroundColor":[],"statusLink":[]}]},
                  options: {
                     onClick:function(evt){
                      onChartClickRedirect(evt,this);
                  }
              },
          });
          }
          if (leads_chart.length > 0) {
              // Leads overview status
              new Chart(leads_chart, {
                  type: 'doughnut',
                  data: {"labels":["Customer"],"datasets":[{"data":["0"],"backgroundColor":["#7cb342"],"hoverBackgroundColor":["#689f2e"],"statusLink":["http:\/\/localhost\/crm\/admin\/leads?status=1"]}]},
                  options:{
                      maintainAspectRatio:false,
                      onClick:function(evt){
                          onChartClickRedirect(evt,this);
                      }
                  }
              });
          }
          if(projects_chart.length > 0){
              // Projects statuses
              new Chart(projects_chart, {
                  type: 'doughnut',
                  data: {"labels":["Not Started","In Progress","On Hold","Cancelled","Finished"],"datasets":[{"data":["0","0","0","0","0"],"backgroundColor":["#989898","#03a9f4","#ff6f00","#989898","#84c529"],"hoverBackgroundColor":["#848484","#0095e0","#eb5b00","#848484","#70b115"],"statusLink":["http:\/\/localhost\/crm\/admin\/projects?status=1","http:\/\/localhost\/crm\/admin\/projects?status=2","http:\/\/localhost\/crm\/admin\/projects?status=3","http:\/\/localhost\/crm\/admin\/projects?status=5","http:\/\/localhost\/crm\/admin\/projects?status=4"],"label":"Statistics by Project Status"}]},
                  options: {
                      maintainAspectRatio:false,
                      onClick:function(evt){
                         onChartClickRedirect(evt,this);
                     }
                 }
             });
          }

          if($(window).width() < 500) {
              // Fix for small devices weekly payment statistics
              $('#weekly-payment-statistics').attr('height', '250');
          }

          fix_user_data_widget_tabs();
          $(window).on('resize', function(){
              $('.horizontal-scrollable-tabs ul.nav-tabs-horizontal').removeAttr('style');
              fix_user_data_widget_tabs();
          });
          // Payments statistics
          init_weekly_payment_statistics( {"labels":["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],"datasets":[{"label":"This Week Payments","backgroundColor":"rgba(37,155,35,0.2)","borderColor":"#84c529","borderWidth":1,"tension":false,"data":[0,0,0,0,0,0,0]},{"label":"Last Week Payments","backgroundColor":"rgba(197, 61, 169, 0.5)","borderColor":"#c53da9","borderWidth":1,"tension":false,"data":[0,0,0,0,0,0,0]}]} );
          $('select[name="currency"]').on('change', function() {
              init_weekly_payment_statistics();
          });})function fix_user_data_widget_tabs(){
          if((app_user_browser != 'firefox'
                  && isRTL == 'false' && is_mobile()) || (app_user_browser == 'firefox'
                  && isRTL == 'false' && is_mobile())){
                  $('.horizontal-scrollable-tabs ul.nav-tabs-horizontal').css('margin-bottom','26px');
          }}function init_weekly_payment_statistics(data) {
          if ($('#weekly-payment-statistics').length > 0) {

              if (typeof(weekly_payments_statistics) !== 'undefined') {
                  weekly_payments_statistics.destroy();
              }
              if (typeof(data) == 'undefined') {
                  var currency = $('select[name="currency"]').val();
                  $.get(admin_url + 'home/weekly_payments_statistics/' + currency, function(response) {
                      weekly_payments_statistics = new Chart($('#weekly-payment-statistics'), {
                          type: 'bar',
                          data: response,
                          options: {
                              responsive:true,
                              scales: {
                                  yAxes: [{
                                    ticks: {
                                      beginAtZero: true,
                                  }
                              }]
                          },
                      },
                  });
                  }, 'json');
              } else {
                  weekly_payments_statistics = new Chart($('#weekly-payment-statistics'), {
                      type: 'bar',
                      data: data,
                      options: {
                          responsive: true,
                          scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true,
                              }
                          }]
                      },
                  },
              });
              }}}
  </script>
</body>
</html>
