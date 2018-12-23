<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Dashboard</title>
    <link href="{{asset('/css/reset.min.css?v=2.1.1')}}" rel="stylesheet">
    <link href='{{asset("/plugins/roboto/roboto.css")}}' rel='stylesheet'>
    <link href="{{asset("/plugins/app-build/vendor.css?v=2.1.1")}}" rel="stylesheet">
    <link href='{{asset("/plugins/fullcalendar/fullcalendar.min.css?v=2.1.1")}}' rel='stylesheet' />
    <link href="{{asset("/css/style.min.css?v=2.1.1" rel="stylesheet")}}">
    <script>var site_url="http://localhost/crm/",admin_url="http://localhost/crm/admin/",max_php_ini_upload_size_bytes="2097152",google_api="",calendarIDs="",is_admin="1",is_staff_member="1",has_permission_tasks_checklist_items_delete="1",app_language="",app_is_mobile="",app_user_browser="chrome",app_date_format="Y-m-d",app_decimal_places="2",app_scroll_responsive_tables="0",app_company_is_required="1",app_default_view_calendar="month",app_maximum_allowed_ticket_attachments="4",app_show_setup_menu_item_only_on_hover="0",app_calendar_events_limit="4",app_tables_pagination_limit="25",app_newsfeed_maximum_files_upload="10",app_time_format="24",app_decimal_separator=".",app_thousand_separator=",",app_currency_placement="before",app_timezone="Europe/Berlin",app_calendar_first_day="0",app_allowed_files=".png,.jpg,.pdf,.doc,.docx,.xls,.xlsx,.zip,.rar,.txt",app_show_table_export_button="to_all",app_desktop_notifications="0",app_dismiss_desktop_not_after="0";var appLang = {};appLang["invoice_task_billable_timers_found"] = "Started timers found";appLang["validation_extension_not_allowed"] = "File extension not allowed";appLang["tag"] = "Tag";appLang["options"] = "Options";appLang["no_items_warning"] = "Enter at least one item.";appLang["item_forgotten_in_preview"] = "Have you forgotten to add this item?";appLang["email_exists"] = "Email already exists";appLang["new_notification"] = "New Notification!";appLang["estimate_number_exists"] = "This estimate number exists for the ongoing year.";appLang["invoice_number_exists"] = "This invoice number exists for the ongoing year.";appLang["confirm_action_prompt"] = "Are you sure you want to perform this action?";appLang["calendar_expand"] = "expand";appLang["proposal_save"] = "Save Proposal";appLang["contract_save"] = "Save Contract";appLang["media_files"] = "Files";appLang["credit_note_number_exists"] = "Credit note number already exists";appLang["item_field_not_formatted"] = "The number in the input field is not formatted while edit/add item and should remain not formatted do not try to format it manually in here.";appLang["filter_by"] = "Filter by";appLang["you_can_not_upload_any_more_files"] = "You can not upload any more files";appLang["cancel_upload"] = "Cancel Upload";appLang["remove_file"] = "Remove file";appLang["browser_not_support_drag_and_drop"] = "Your browser does not support drag'n'drop file uploads";appLang["drop_files_here_to_upload"] = "Drop files here to upload";appLang["file_exceeds_max_filesize"] = "The uploaded file exceeds the upload_max_filesize directive in php.ini (2 MB)";appLang["file_exceeds_maxfile_size_in_form"] = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form (2 MB)";appLang["unit"] = "Unit";appLang["dt_length_menu_all"] = "All";appLang["dt_button_reload"] = "Reload";appLang["dt_button_excel"] = "Excel";appLang["dt_button_csv"] = "CSV";appLang["dt_button_pdf"] = "PDF";appLang["dt_button_print"] = "Print";appLang["dt_button_export"] = "Export";appLang["search_ajax_empty"] = "Select and begin typing";appLang["search_ajax_initialized"] = "Start typing to search";appLang["search_ajax_searching"] = "Searching...";appLang["not_results_found"] = "No results found";appLang["search_ajax_placeholder"] = "Type to search...";appLang["currently_selected"] = "Currently Selected";appLang["task_stop_timer"] = "Stop Timer";appLang["dt_button_column_visibility"] = "Visibility";appLang["note"] = "Note";appLang["search_tasks"] = "Search Tasks";appLang["confirm"] = "Confirm";appLang["showing_billable_tasks_from_project"] = "Showing billable tasks from project";appLang["invoice_task_item_project_tasks_not_included"] = "Projects tasks are not included in this list.";appLang["credit_amount_bigger_then_invoice_balance"] = "Total credits amount is bigger then invoice balance due";appLang["credit_amount_bigger_then_credit_note_remaining_credits"] = "Total credits amount is bigger then remaining credits";appLang["save"] = "Save";
    </script>    
    <script>
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

        var csrfData = {"formatted":{"csrf_token_name":"c49d74a9b4c3de367b8456cc5c686da8"},"token_name":"csrf_token_name","hash":"c49d74a9b4c3de367b8456cc5c686da8"};

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
        }
    </script>
</head>


<body class="app admin dashboard invoices-total-manual user-id-1 chrome">
<div id="header">
   <div class="hide-menu"><i class="fa fa-bars"></i></div>
   <div id="logo"></div>
   <nav>
      <div class="small-logo"><span class="text-primary"></span></div>
      <div class="mobile-menu">
        <button type="button" class="navbar-toggle visible-md visible-sm visible-xs mobile-menu-toggle collapsed" data-toggle="collapse" data-target="#mobile-collapse" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
        </button>
        <ul class="mobile-icon-menu"></ul>
        <div class="mobile-navbar collapse" id="mobile-collapse" aria-expanded="false" style="height: 0px;" role="navigation" >
            <ul class="nav navbar-nav">
              <li class="header-my-profile"><a href="">My Profile</a></li>
              <li class="header-logout"><a href="" onclick="logout(); return false;">Logout</a></li>
            </ul>
        </div>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li id="top_search" class="dropdown" data-toggle="tooltip" data-placement="bottom" data-title="Use # + tagname to search by tags">
        <input type="search" id="search_input" class="form-control" placeholder="Search...">
        <div id="search_results"></div>
        </li>
        <li id="top_search_button">
           <button class="btn"><i class="fa fa-search"></i></button>
        </li>
        <li class="icon header-user-profile" data-toggle="tooltip" title="shiva sapra" data-placement="bottom">
            <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="false">
            <img src="" class="img img-responsive staff-profile-image-small pull-left" alt="shiva sapra" /></a>
            <ul class="dropdown-menu animated fadeIn">
               <li class="header-my-profile"><a href="">My Profile</a></li>
               <li class="header-logout">
                  <a href="{{ route('logout') }}" >Logout</a>
               </li>
            </ul>
        </li>
      </div>
<aside id="menu" class="sidebar">
   <ul class="nav metis-menu" id="side-menu">
      <li class="dashboard_user">
         Welcome <a href="{{ route('logout') }}">
          <i class="fa fa-power-off top-left-logout pull-right" data-toggle="tooltip" data-title="Logout" data-placement="right"></i>
        </a>
      </li>
      <li class="menu-item-dashboard">
         <a href="" aria-expanded="false">
          <i class="fa fa-tachometer menu-icon"></i>
         Dashboard </a>
      </li>
                  <li class="menu-item-customers">
         <a href="http://localhost/crm/admin/clients" aria-expanded="false"><i class="fa fa-user-o menu-icon"></i>
         Customers                  </a>
               </li>
                  <li class="menu-item-sales">
         <a href="#" aria-expanded="false"><i class="fa fa-balance-scale menu-icon"></i>
         Sales                  <span class="fa arrow"></span>
                  </a>
                  <ul class="nav nav-second-level collapse" aria-expanded="false">
                        <li class="sub-menu-item-child-proposals"><a href="http://localhost/crm/admin/proposals">
                              Proposals</a>
            </li>
                        <li class="sub-menu-item-child-estimates"><a href="http://localhost/crm/admin/estimates/list_estimates">
                              Estimates</a>
            </li>
                        <li class="sub-menu-item-child-invoices"><a href="http://localhost/crm/admin/invoices/list_invoices">
                              Invoices</a>
            </li>
                        <li class="sub-menu-item-child-payments"><a href="http://localhost/crm/admin/payments">
                              Payments</a>
            </li>
                        <li class="sub-menu-item-credit_notes"><a href="http://localhost/crm/admin/credit_notes">
                              Credit Notes</a>
            </li>
                        <li class="sub-menu-item-child-items"><a href="http://localhost/crm/admin/invoice_items">
                              Items</a>
            </li>
                     </ul>
               </li>
                  <li class="menu-item-subscriptions">
         <a href="http://localhost/crm/admin/subscriptions" aria-expanded="false"><i class="fa fa-repeat menu-icon"></i>
         Subscriptions                  </a>
               </li>
                  <li class="menu-item-expenses">
         <a href="http://localhost/crm/admin/expenses/list_expenses" aria-expanded="false"><i class="fa fa-file-text-o menu-icon"></i>
         Expenses                  </a>
               </li>
                  <li class="menu-item-contracts">
         <a href="http://localhost/crm/admin/contracts" aria-expanded="false"><i class="fa fa-file menu-icon"></i>
         Contracts                  </a>
               </li>
                  <li class="menu-item-projects">
         <a href="http://localhost/crm/admin/projects" aria-expanded="false"><i class="fa fa-bars menu-icon"></i>
         Projects                  </a>
               </li>
                  <li class="menu-item-tasks">
         <a href="http://localhost/crm/admin/tasks/list_tasks" aria-expanded="false"><i class="fa fa-tasks menu-icon"></i>
         Tasks                  </a>
               </li>
                  <li class="menu-item-tickets">
         <a href="http://localhost/crm/admin/tickets" aria-expanded="false"><i class="fa fa-ticket menu-icon"></i>
         Support                  </a>
               </li>
                  <li class="menu-item-leads">
         <a href="http://localhost/crm/admin/leads" aria-expanded="false"><i class="fa fa-tty menu-icon"></i>
         Leads                  </a>
               </li>
                  <li class="menu-item-knowledge-base">
         <a href="http://localhost/crm/admin/knowledge_base" aria-expanded="false"><i class="fa fa-folder-open-o menu-icon"></i>
         Knowledge Base                  </a>
               </li>
                  <li class="menu-item-utilities">
         <a href="#" aria-expanded="false"><i class="fa fa-cogs menu-icon"></i>
         Utilities                  <span class="fa arrow"></span>
                  </a>
                  <ul class="nav nav-second-level collapse" aria-expanded="false">
                        <li class="sub-menu-item-child-media"><a href="http://localhost/crm/admin/utilities/media">
                              Media</a>
            </li>
                        <li class="sub-menu-item-child-bulk-pdf-exporter"><a href="http://localhost/crm/admin/utilities/bulk_pdf_exporter">
                              Bulk PDF Export</a>
            </li>
                        <li class="sub-menu-item-child-calendar"><a href="http://localhost/crm/admin/utilities/calendar">
                              Calendar</a>
            </li>
                        <li class="sub-menu-item-child-goals-tracking"><a href="http://localhost/crm/admin/goals">
                              Goals Tracking</a>
            </li>
                        <li class="sub-menu-item-child-surveys"><a href="http://localhost/crm/admin/surveys">
                              Surveys</a>
            </li>
                        <li class="sub-menu-item-child-announcements"><a href="http://localhost/crm/admin/announcements">
                              Announcements</a>
            </li>
                        <li class="sub-menu-item-child-database-backup"><a href="http://localhost/crm/admin/utilities/backup">
                              Database Backup</a>
            </li>
                        <li class="sub-menu-item-child-activity-log"><a href="http://localhost/crm/admin/utilities/activity_log">
                              Activity Log</a>
            </li>
                        <li class="sub-menu-item-ticket-pipe-log"><a href="http://localhost/crm/admin/utilities/pipe_log">
                              Ticket Pipe Log</a>
            </li>
                     </ul>
               </li>
                  <li class="menu-item-reports">
         <a href="#" aria-expanded="false"><i class="fa fa-area-chart menu-icon"></i>
         Reports                  <span class="fa arrow"></span>
                  </a>
                  <ul class="nav nav-second-level collapse" aria-expanded="false">
                        <li class="sub-menu-item-child-sales"><a href="http://localhost/crm/admin/reports/sales">
                              Sales</a>
            </li>
                        <li class="sub-menu-item-child-expenses"><a href="http://localhost/crm/admin/reports/expenses">
                              Expenses</a>
            </li>
                        <li class="sub-menu-item-child-expenses-vs-income"><a href="http://localhost/crm/admin/reports/expenses_vs_income">
                              Expenses vs Income</a>
            </li>
                        <li class="sub-menu-item-child-leads"><a href="http://localhost/crm/admin/reports/leads">
                              Leads</a>
            </li>
                        <li class="sub-menu-item-reports_timesheets_overview"><a href="http://localhost/crm/admin/staff/timesheets?view=all">
                              Timesheets overview</a>
            </li>
                        <li class="sub-menu-item-child-kb-articles"><a href="http://localhost/crm/admin/reports/knowledge_base_articles">
                              KB Articles</a>
            </li>
                     </ul>
               </li>
                        <li id="setup-menu-item">
         <a href="#" class="open-customizer"><i class="fa fa-cog menu-icon"></i>
         Setup</a>
               </li>
               </ul>
</aside>
<div id="wrapper">
    <div class="screen-options-area"></div>
    <div class="screen-options-btn">
        Dashboard Options    </div>
    <div class="content">
        <div class="row">

            
            
            <div class="clearfix"></div>

            <div class="col-md-12 mtop30" data-container="top-12">
                <div class="widget relative hide" id="widget-top_stats" data-name="Quick Statistics">       <div class="widget-dragger"></div>       <div class="row">                         <div class="quick-stats-invoices col-xs-12 col-md-6 col-sm-6 col-lg-3">             <div class="top_stats_wrapper">                               <p class="text-uppercase mtop5"><i class="hidden-sm fa fa-balance-scale"></i> Invoices Awaiting Payment                  <span class="pull-right">0 / 0</span>                </p>                <div class="clearfix"></div>                <div class="progress no-margin progress-bar-mini">                   <div class="progress-bar progress-bar-danger no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                   </div>                </div>             </div>          </div>                            <div class="quick-stats-leads col-xs-12 col-md-6 col-sm-6 col-lg-3">             <div class="top_stats_wrapper">                               <p class="text-uppercase mtop5"><i class="hidden-sm fa fa-tty"></i> Converted Leads                  <span class="pull-right">0 / 0</span>                </p>                <div class="clearfix"></div>                <div class="progress no-margin progress-bar-mini">                   <div class="progress-bar progress-bar-success no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                   </div>                </div>             </div>          </div>                   <div class="quick-stats-projects col-xs-12 col-md-6 col-sm-6 col-lg-3">             <div class="top_stats_wrapper">                               <p class="text-uppercase mtop5"><i class="hidden-sm fa fa-cubes"></i> Projects In Progress<span class="pull-right">0 / 0</span></p>                <div class="clearfix"></div>                <div class="progress no-margin progress-bar-mini">                   <div class="progress-bar no-percent-text not-dynamic" style="background:#03a9f4" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">                   </div>                </div>             </div>          </div>          <div class="quick-stats-tasks col-xs-12 col-md-6 col-sm-6 col-lg-3">             <div class="top_stats_wrapper">                               <p class="text-uppercase mtop5"><i class="hidden-sm fa fa-tasks"></i> Tasks Not Finished <span class="pull-right">                   0 / 0                  </span>                </p>                <div class="clearfix"></div>                <div class="progress no-margin progress-bar-mini">                   <div class="progress-bar progress-bar-default no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                   </div>                </div>             </div>          </div>       </div>    </div>             </div>

            
            <div class="col-md-6" data-container="middle-left-6">
                            </div>
            <div class="col-md-6" data-container="middle-right-6">
                            </div>

            
            <div class="col-md-8" data-container="left-8">
                <div class="widget hide" id="widget-finance_overview" data-name="Finance Overview">       <div class="finance-summary">       <div class="panel_s">          <div class="panel-body">             <div class="widget-dragger"></div>             <div class="row home-summary">                                  <div class="col-md-6 col-lg-4 col-sm-6">                      <div class="row">                         <div class="col-md-12">                            <p class="text-dark text-uppercase">Invoice overview</p>                            <hr class="mtop15" />                         </div>                                                 <div class="col-md-12 text-stats-wrapper">                            <a href="http://localhost/crm/admin/invoices/list_invoices?status=6" class="text-muted mbot15 inline-block">                               <span class="_total bold">0</span> Draft                           </a>                         </div>                         <div class="col-md-12 text-right progress-finance-status">                            0%                            <div class="progress no-margin progress-bar-mini">                               <div class="progress-bar progress-bar-default no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                               </div>                            </div>                         </div>                                                 <div class="col-md-12 text-stats-wrapper">                            <a href="http://localhost/crm/admin/invoices/list_invoices?filter=not_sent" class="text-muted inline-block mbot15">                               <span class="_total bold">0</span> Not Sent                           </a>                         </div>                         <div class="col-md-12 text-right progress-finance-status">                            0%                            <div class="progress no-margin progress-bar-mini">                               <div class="progress-bar progress-bar-default no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                               </div>                            </div>                         </div>                                                 <div class="col-md-12 text-stats-wrapper">                            <a href="http://localhost/crm/admin/invoices/list_invoices?status=1" class="text-danger mbot15 inline-block">                               <span class="_total bold">0</span> Unpaid                           </a>                         </div>                         <div class="col-md-12 text-right progress-finance-status">                            0%                            <div class="progress no-margin progress-bar-mini">                               <div class="progress-bar progress-bar-danger no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                               </div>                            </div>                         </div>                                                 <div class="col-md-12 text-stats-wrapper">                            <a href="http://localhost/crm/admin/invoices/list_invoices?status=3" class="text-warning mbot15 inline-block">                               <span class="_total bold">0</span> Partially Paid                           </a>                         </div>                         <div class="col-md-12 text-right progress-finance-status">                            0%                            <div class="progress no-margin progress-bar-mini">                               <div class="progress-bar progress-bar-danger no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                               </div>                            </div>                         </div>                                                 <div class="col-md-12 text-stats-wrapper">                            <a href="http://localhost/crm/admin/invoices/list_invoices?status=4" class="text-warning mbot15 inline-block">                               <span class="_total bold">0</span> Overdue                           </a>                         </div>                         <div class="col-md-12 text-right progress-finance-status">                            0%                            <div class="progress no-margin progress-bar-mini">                               <div class="progress-bar progress-bar-warning no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                               </div>                            </div>                         </div>                                                 <div class="col-md-12 text-stats-wrapper">                            <a href="http://localhost/crm/admin/invoices/list_invoices?status=2" class="text-success mbot15 inline-block">                               <span class="_total bold">0</span> Paid                           </a>                         </div>                         <div class="col-md-12 text-right progress-finance-status">                            0%                            <div class="progress no-margin progress-bar-mini">                               <div class="progress-bar progress-bar-success no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                               </div>                            </div>                         </div>                      </div>                   </div>                                                       <div class="col-md-6 col-lg-4 col-sm-6">                      <div class="row">                         <div class="col-md-12 text-stats-wrapper">                            <p class="text-dark text-uppercase">Estimate overview</p>                            <hr class="mtop15" />                         </div>                                                  <div class="col-md-12 text-stats-wrapper">                            <a href="http://localhost/crm/admin/estimates/list_estimates?status=1" class="text-muted mbot15 inline-block estimate-status-dashboard-muted">                               <span class="_total bold">0</span>                               Draft                           </a>                         </div>                         <div class="col-md-12 text-right progress-finance-status">                            0%                            <div class="progress no-margin progress-bar-mini">                               <div class="progress-bar progress-bar-default no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                               </div>                            </div>                         </div>                                                  <div class="col-md-12 text-stats-wrapper">                            <a href="http://localhost/crm/admin/estimates/list_estimates?filter=not_sent" class="text-muted mbot15 inline-block estimate-status-dashboard-muted">                               <span class="_total bold">0</span>                               Not Sent                           </a>                         </div>                         <div class="col-md-12 text-right progress-finance-status">                            0%                            <div class="progress no-margin progress-bar-mini">                               <div class="progress-bar progress-bar-default no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                               </div>                            </div>                         </div>                                                  <div class="col-md-12 text-stats-wrapper">                            <a href="http://localhost/crm/admin/estimates/list_estimates?status=2" class="text-info mbot15 inline-block estimate-status-dashboard-info">                               <span class="_total bold">0</span>                               Sent                           </a>                         </div>                         <div class="col-md-12 text-right progress-finance-status">                            0%                            <div class="progress no-margin progress-bar-mini">                               <div class="progress-bar progress-bar-info no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                               </div>                            </div>                         </div>                                                  <div class="col-md-12 text-stats-wrapper">                            <a href="http://localhost/crm/admin/estimates/list_estimates?status=5" class="text-warning mbot15 inline-block estimate-status-dashboard-warning">                               <span class="_total bold">0</span>                               Expired                           </a>                         </div>                         <div class="col-md-12 text-right progress-finance-status">                            0%                            <div class="progress no-margin progress-bar-mini">                               <div class="progress-bar progress-bar-warning no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                               </div>                            </div>                         </div>                                                  <div class="col-md-12 text-stats-wrapper">                            <a href="http://localhost/crm/admin/estimates/list_estimates?status=3" class="text-danger mbot15 inline-block estimate-status-dashboard-danger">                               <span class="_total bold">0</span>                               Declined                           </a>                         </div>                         <div class="col-md-12 text-right progress-finance-status">                            0%                            <div class="progress no-margin progress-bar-mini">                               <div class="progress-bar progress-bar-danger no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                               </div>                            </div>                         </div>                                                  <div class="col-md-12 text-stats-wrapper">                            <a href="http://localhost/crm/admin/estimates/list_estimates?status=4" class="text-success mbot15 inline-block estimate-status-dashboard-success">                               <span class="_total bold">0</span>                               Accepted                           </a>                         </div>                         <div class="col-md-12 text-right progress-finance-status">                            0%                            <div class="progress no-margin progress-bar-mini">                               <div class="progress-bar progress-bar-success no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                               </div>                            </div>                         </div>                                              </div>                   </div>                                                       <div class="col-md-12 col-sm-6 col-lg-4">                      <div class="row">                         <div class="col-md-12 text-stats-wrapper">                            <p class="text-dark text-uppercase">Proposal overview</p>                            <hr class="mtop15" />                         </div>                                                    <div class="col-md-12 text-stats-wrapper">                               <a href="http://localhost/crm/admin/proposals/list_proposals?status=6" class="text-muted mbot15 inline-block">                                  <span class="_total bold">0</span> Draft                              </a>                            </div>                            <div class="col-md-12 text-right progress-finance-status">                               0%                               <div class="progress no-margin progress-bar-mini">                                  <div class="progress-bar progress-bar-default no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                                  </div>                               </div>                            </div>                                                       <div class="col-md-12 text-stats-wrapper">                               <a href="http://localhost/crm/admin/proposals/list_proposals?status=4" class="text-info mbot15 inline-block">                                  <span class="_total bold">0</span> Sent                              </a>                            </div>                            <div class="col-md-12 text-right progress-finance-status">                               0%                               <div class="progress no-margin progress-bar-mini">                                  <div class="progress-bar progress-bar-info no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                                  </div>                               </div>                            </div>                                                       <div class="col-md-12 text-stats-wrapper">                               <a href="http://localhost/crm/admin/proposals/list_proposals?status=1" class="text-muted mbot15 inline-block">                                  <span class="_total bold">0</span> Open                              </a>                            </div>                            <div class="col-md-12 text-right progress-finance-status">                               0%                               <div class="progress no-margin progress-bar-mini">                                  <div class="progress-bar progress-bar-default no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                                  </div>                               </div>                            </div>                                                       <div class="col-md-12 text-stats-wrapper">                               <a href="http://localhost/crm/admin/proposals/list_proposals?status=5" class="text-info mbot15 inline-block">                                  <span class="_total bold">0</span> Revised                              </a>                            </div>                            <div class="col-md-12 text-right progress-finance-status">                               0%                               <div class="progress no-margin progress-bar-mini">                                  <div class="progress-bar progress-bar-info no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                                  </div>                               </div>                            </div>                                                       <div class="col-md-12 text-stats-wrapper">                               <a href="http://localhost/crm/admin/proposals/list_proposals?status=2" class="text-danger mbot15 inline-block">                                  <span class="_total bold">0</span> Declined                              </a>                            </div>                            <div class="col-md-12 text-right progress-finance-status">                               0%                               <div class="progress no-margin progress-bar-mini">                                  <div class="progress-bar progress-bar-danger no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                                  </div>                               </div>                            </div>                                                       <div class="col-md-12 text-stats-wrapper">                               <a href="http://localhost/crm/admin/proposals/list_proposals?status=3" class="text-success mbot15 inline-block">                                  <span class="_total bold">0</span> Accepted                              </a>                            </div>                            <div class="col-md-12 text-right progress-finance-status">                               0%                               <div class="progress no-margin progress-bar-mini">                                  <div class="progress-bar progress-bar-success no-percent-text not-dynamic" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-percent="0">                                  </div>                               </div>                            </div>                                                       <div class="clearfix"></div>                         </div>                      </div>                                        </div>                                     <hr />                   <a href="#" class="hide invoices-total initialized"></a>                   <div id="invoices_total" class="invoices-total-inline">                      <div class="row">       <div class="col-lg-4 col-xs-12 col-md-12 total-column">       <div class="panel_s">          <div class="panel-body">             <h3 class="text-muted _total">                $0.00            </h3>             <span class="text-warning">Outstanding Invoices</span>          </div>       </div>    </div>    <div class="col-lg-4 col-xs-12 col-md-12 total-column">       <div class="panel_s">          <div class="panel-body">             <h3 class="text-muted _total">                $0.00            </h3>             <span class="text-danger">Past Due Invoices</span>          </div>       </div>    </div>    <div class="col-lg-4 col-xs-12 col-md-12 total-column">       <div class="panel_s">          <div class="panel-body">             <h3 class="text-muted _total">                $0.00            </h3>             <span class="text-success">Paid Invoices</span>          </div>       </div>    </div> </div> <div class="clearfix"></div> <script>    (function() {      if(typeof(init_selectpicker) == 'function'){        init_selectpicker();      }    })(); </script>                   </div>                                  </div>             </div>          </div>                </div>  <div class="widget hide" id="widget-user_data" data-name="User Widget">    <div class="panel_s user-data">       <div class="panel-body home-activity">          <div class="widget-dragger"></div>          <div class="horizontal-scrollable-tabs">             <div class="scroller scroller-left arrow-left"><i class="fa fa-angle-left"></i></div>             <div class="scroller scroller-right arrow-right"><i class="fa fa-angle-right"></i></div>             <div class="horizontal-tabs">                <ul class="nav nav-tabs nav-tabs-horizontal" role="tablist">                   <li role="presentation" class="active">                      <a href="#home_tab_tasks" aria-controls="home_tab_tasks" role="tab" data-toggle="tab">                         <i class="fa fa-tasks menu-icon"></i> My Tasks                     </a>                   </li>                   <li role="presentation">                      <a href="#home_my_projects" onclick="init_table_staff_projects(true);" aria-controls="home_my_projects" role="tab" data-toggle="tab">                      <i class="fa fa-bars menu-icon"></i> My Projects                     </a>                   </li>                   <li role="presentation">                      <a href="#home_my_reminders" onclick="initDataTable('.table-my-reminders', admin_url + 'misc/my_reminders', undefined, undefined,undefined,[2,'asc']);" aria-controls="home_my_reminders" role="tab" data-toggle="tab">                      <i class="fa fa-clock-o menu-icon"></i> My Reminders                                          </a>                   </li>                                     <li role="presentation">                      <a href="#home_tab_tickets" onclick="init_table_tickets(true);" aria-controls="home_tab_tickets" role="tab" data-toggle="tab">                      <i class="fa fa-ticket menu-icon"></i> Tickets                     </a>                   </li>                                                       <li role="presentation">                      <a href="#home_announcements" onclick="init_table_announcements(true);" aria-controls="home_announcements" role="tab" data-toggle="tab">                      <i class="fa fa-bullhorn menu-icon"></i> Announcements                                          </a>                   </li>                                                       <li role="presentation">                      <a href="#home_tab_activity" aria-controls="home_tab_activity" role="tab" data-toggle="tab">                      <i class="fa fa-window-maximize menu-icon"></i> Latest Activity                     </a>                   </li>                                  </ul>                <hr class="hr-panel-heading hr-user-data-tabs" />                <div class="tab-content">                   <div role="tabpanel" class="tab-pane active" id="home_tab_tasks">                      <a href="http://localhost/crm/admin/tasks/list_tasks" class="mbot20 inline-block full-width">View All</a>                      <div class="clearfix"></div>                      <div class="_hidden_inputs _filters _tasks_filters">                          <input type="hidden" name="my_tasks" value="1" />  <input type="hidden" name="task_status_1" value="true" />  <input type="hidden" name="task_status_4" value="true" />  <input type="hidden" name="task_status_3" value="true" />  <input type="hidden" name="task_status_2" value="true" />  <input type="hidden" name="task_status_5" value="" />                      </div>                      <div class=""><table data-last-order-identifier="tasks" data-default-order="" class="dt-table-loading table table-tasks"><thead><tr><th class="not_visible" ><span class="hide"> - </span><div class="checkbox mass_select_all_wrap"><input type="checkbox" id="mass_select_all" data-to-table="tasks"><label></label></div></th><th>Name</th><th>Status</th><th>Start Date</th><th class="duedate" >Due Date</th><th>Assigned to</th><th>Tags</th><th>Priority</th></tr></thead><tbody></tbody></table></div>                  </div>                                     <div role="tabpanel" class="tab-pane" id="home_tab_tickets">                      <a href="http://localhost/crm/admin/tickets" class="mbot20 inline-block full-width">View All</a>                      <div class="clearfix"></div>                      <div class="_filters _hidden_inputs hidden tickets_filters">                          <input type="hidden" name="ticket_status_1" value="1" />  <input type="hidden" name="ticket_status_2" value="1" />  <input type="hidden" name="ticket_status_4" value="1" />                      </div>                      <table class="table customizable-table dt-table-loading tickets-table table-tickets" id="table-tickets" data-last-order-identifier="tickets" data-default-order=""><thead><tr><th class="not_visible"><span class="hide"> - </span><div class="checkbox mass_select_all_wrap"><input type="checkbox" id="mass_select_all" data-to-table="tickets"><label></label></div></th><th class="toggleable" id="th-number">#</th><th class="toggleable" id="th-subject">Subject</th><th class="toggleable" id="th-tags">Tags</th><th class="toggleable" id="th-department">Department</th><th>Service</th><th class="toggleable" id="th-submitter">Contact</th><th class="toggleable" id="th-status">Status</th><th class="toggleable" id="th-priority">Priority</th><th class="toggleable" id="th-last-reply">Last Reply</th><th class="toggleable ticket_created_column" id="th-created">Created</th></tr></thead><tbody></tbody></table><script id="hidden-columns-table-tickets" type="text/json"></script>                  </div>                                     <div role="tabpanel" class="tab-pane" id="home_my_projects">                      <a href="http://localhost/crm/admin/projects" class="mbot20 inline-block full-width">View All</a>                      <div class="clearfix"></div>                      <div class=""><table data-last-order-identifier="my-projects" data-default-order="" class="dt-table-loading table table-staff-projects"><thead><tr><th>Project Name</th><th>Start Date</th><th>Deadline</th><th>Status</th></tr></thead><tbody></tbody></table></div>                  </div>                   <div role="tabpanel" class="tab-pane" id="home_my_reminders">                      <a href="http://localhost/crm/admin/misc/reminders" class="mbot20 inline-block full-width">                      View All                     </a>                      <div class=""><table class="dt-table-loading table table-my-reminders"><thead><tr><th>Related to</th><th>Description</th><th>Date</th></tr></thead><tbody></tbody></table></div>                  </div>                                     <div role="tabpanel" class="tab-pane" id="home_announcements">                                           <a href="http://localhost/crm/admin/announcements" class="mbot20 inline-block full-width">View All</a>                      <div class="clearfix"></div>                                           <div class=""><table class="dt-table-loading table table-announcements"><thead><tr><th>Subject</th><th>Date</th></tr></thead><tbody></tbody></table></div>                  </div>                                                       <div role="tabpanel" class="tab-pane" id="home_tab_activity">                      <a href="http://localhost/crm/admin/utilities/activity_log" class="mbot20 inline-block full-width">View All</a>                      <div class="clearfix"></div>                      <div class="activity-feed">                                              </div>                   </div>                                  </div>             </div>          </div>       </div>    </div> </div> <div class="widget hide" id="widget-upcoming_events">
   </div>

<div class="widget hide" id="widget-calendar" data-name="Calendar">   <div class="clearfix"></div>   <div class="panel_s">    <div class="panel-body">     <div class="widget-dragger"></div>     <div class="dt-loader hide"></div>     <div id="calendar_filters" style="display:none;">     <form action="http://localhost/crm/admin" method="post" accept-charset="utf-8">                                                                                                    <input type="hidden" name="csrf_token_name" value="c49d74a9b4c3de367b8456cc5c686da8" />      <input type="hidden" name="calendar_filters" value="1" />     <div class="row">         <div class="col-md-3">             <div class="checkbox">                 <input type="checkbox" value="1" name="events" id="cf_events">                 <label for="cf_events">Events</label>             </div>                         <div class="checkbox">                 <input type="checkbox" value="1" name="tasks" id="cf_tasks">                 <label for="cf_tasks">Tasks</label>             </div>                                     <div class="checkbox">                 <input type="checkbox" value="1" name="projects" id="cf_projects">                 <label for="cf_projects">Projects</label>             </div>                                     <div class="checkbox">                 <input type="checkbox" value="1" name="invoices" id="cf_invoices">                 <label for="cf_invoices">Invoices</label>             </div>                                     <div class="checkbox">                 <input type="checkbox" value="1" name="estimates" id="cf_estimates">                 <label for="cf_estimates">Estimates</label>             </div>                     </div>         <div class="col-md-3">                       <div class="checkbox">             <input type="checkbox" value="1" name="proposals" id="cf_proposals">             <label for="cf_proposals">Proposals</label>         </div>                         <div class="checkbox">             <input type="checkbox" value="1" name="contracts" id="cf_contracts">             <label for="cf_contracts">Contracts</label>         </div>                         <div class="checkbox">             <input type="checkbox" value="1" name="customer_reminders" id="cf_customers_reminders">             <label for="cf_customers_reminders">Customer Reminders</label>         </div>                          <div class="checkbox">             <input type="checkbox" value="1" name="expense_reminders" id="cf_expenses_reminders">             <label for="cf_expenses_reminders">Expense Reminders</label>         </div>                           <div class="checkbox">             <input type="checkbox" value="1" name="lead_reminders" id="cf_leads_reminders">             <label for="cf_leads_reminders">Lead Reminders</label>         </div>             </div>     <div class="col-md-3">                  <div class="checkbox">             <input type="checkbox" value="1" name="estimate_reminders" id="cf_estimates_reminders">             <label for="cf_estimates_reminders">Estimate Reminders</label>         </div>                          <div class="checkbox">             <input type="checkbox" value="1" name="invoice_reminders" id="cf_invoices_reminders">             <label for="cf_invoices_reminders">Invoice Reminders</label>         </div>                         <div class="checkbox">             <input type="checkbox" value="1" name="credit_note_reminders" id="cf_credit_note_reminders">             <label for="cf_credit_note_reminders">Credit Note Reminders</label>         </div>                         <div class="checkbox">             <input type="checkbox" value="1" name="proposal_reminders" id="cf_proposal_reminders">             <label for="cf_proposal_reminders">Proposal Reminders</label>         </div>             </div>     <div class="col-md-3 text-right">         <a class="btn btn-default" href="http://localhost/crm/admin">Clear</a>         <button class="btn btn-success" type="submit">Apply</button>     </div>  </div> <hr class="mbot15" /> <div class="clearfix"></div> </form></div>     <div id="calendar"></div>   </div> </div> <div class="clearfix"></div> </div>  <div class="widget hide" id="widget-weekly_payments_chart" data-name="Weekly Payment Records">       <div class="row" id="weekly_payments">       <div class="col-md-12">          <div class="panel_s">             <div class="panel-body padding-10">                <div class="widget-dragger"></div>                <div class="col-md-12">                   <p class="pull-left mtop5">Weekly Payment Records</p>                                     <a href="http://localhost/crm/admin/reports/sales" class="pull-right mtop5">Full Report</a>                   <div class="clearfix"></div>                                     <div class="clearfix"></div>                   <div class="row mtop5">                      <hr class="hr-panel-heading-dashboard">                   </div>                                      <canvas height="130" class="weekly-payments-chart-dashboard" id="weekly-payment-statistics"></canvas>                    <div class="clearfix"></div>                 </div>              </div>           </div>        </div>     </div>      </div>              </div>
            <div class="col-md-4" data-container="right-4">
                 <div class="widget hide" id="widget-todos" data-name="My To Do Items">     <div class="panel_s todo-panel">       <div class="panel-body padding-10">          <div class="widget-dragger"></div>          <p class="pull-left padding-5">             My To Do Items         </p>          <a href="http://localhost/crm/admin/todo" class="pull-right padding-5">&nbsp;|&nbsp;View All</a>          <a href="#__todo" data-toggle="modal" class="pull-right padding-5" style="padding-right:0px;">             New To Do         </a>          <div class="clearfix"></div>          <hr class="hr-panel-heading-dashboard">                   <h4 class="todo-title text-warning"><i class="fa fa-warning"></i> Latest to do's</h4>          <ul class="list-unstyled todo unfinished-todos todos-sortable sortable">                      <li class="padding no-todos ui-state-disabled">No todos found</li>       </ul>             <h4 class="todo-title text-success"><i class="fa fa-check"></i> Latest finished to do's</h4>       <ul class="list-unstyled todo finished-todos todos-sortable sortable" >                <li class="padding no-todos ui-state-disabled">No finished todos found</li>    </ul> </div> </div> <div class="modal fade" id="__todo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">     <div class="modal-dialog" role="document">         <div class="modal-content">             <div class="modal-header">                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                 <h4 class="modal-title" id="myModalLabel">                     <span class="edit-title hide">Edit todo item</span>                     <span class="add-title hide">Add New Todo</span>                 </h4>             </div>             <form action="http://localhost/crm/admin/todo/todo" id="add_new_todo_item" method="post" accept-charset="utf-8">                                                                                                                             <input type="hidden" name="csrf_token_name" value="c49d74a9b4c3de367b8456cc5c686da8" />             <div class="modal-body">                 <div class="row">                  <input type="hidden" name="todoid" value="" />                     <div class="col-md-12">                         <div class="form-group" app-field-wrapper="description"><label for="description" class="control-label">Description</label><textarea id="description" name="description" class="form-control" rows="4"></textarea></div>                    </div>                 </div>             </div>             <div class="modal-footer">                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                 <button type="submit" class="btn btn-info">Save</button>             </div>             </form>        </div>     </div> </div> </div> <div class="widget hide" id="widget-goals">
      <div class="row">
      <div class="col-md-12">
         <div class="panel_s">
            <div class="panel-body padding-10">
               <div class="widget-dragger"></div>
               <p class="padding-5">
                  Goals               </p>
               <hr class="hr-panel-heading-dashboard">
                              </div>
            </div>
         </div>
      </div>
         </div>
<div class="widget hide" id="widget-leads_chart" data-name="Leads Chart">       <div class="row">       <div class="col-md-12">          <div class="panel_s">             <div class="panel-body padding-10">                <div class="widget-dragger"></div>                <p class="padding-5">Leads Overview</p>                <hr class="hr-panel-heading-dashboard">                <div class="relative" style="height:250px">                   <canvas class="chart" height="250" id="leads_status_stats"></canvas>                </div>             </div>          </div>       </div>    </div>    </div>  <div class="widget hide" id="widget-projects_chart" data-name="Projects Chart">     <div class="row">         <div class="col-md-12">            <div class="panel_s">                <div class="panel-body padding-10">                 <div class="widget-dragger"></div>                 <p class="padding-5">Statistics by Project Status</p>                 <hr class="hr-panel-heading-dashboard">                 <div class="relative" style="height:250px">                    <canvas class="chart" height="250" id="projects_status_stats"></canvas>                </div>            </div>        </div>    </div> </div> </div> <div class="widget" id="widget-tickets_chart">
  </div>

<div class="widget hide hide" id="widget-projects_activity" data-name="Latest Project Activity">   <div class="panel_s projects-activity">    <div class="panel-body padding-10">     <div class="widget-dragger"></div>     <p class="padding-5">Latest Project Activity</p>     <hr class="hr-panel-heading-dashboard">     <div class="activity-feed">       </div> </div> </div> </div>             </div>

            <div class="clearfix"></div>

            <div class="col-md-4" data-container="bottom-left-4">
                            </div>
             <div class="col-md-4" data-container="bottom-middle-4">
                            </div>
            <div class="col-md-4" data-container="bottom-right-4">
                            </div>

                    </div>
    </div>
</div>
<script>
    google_api = '';
    calendarIDs = '[]';
</script>
<!-- Likes -->
<div class="modal likes_modal fade" id="modal_post_likes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Colleagues who like this post</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div id="modal_post_likes_wrapper">

          </div>

        </div>

      </div>
      <div class="modal-footer">
         <a href="#" class="btn btn-info load_more_post_likes">Load More</a>
      </div>
    </div>
  </div>
</div>
<!-- Likes -->
<div class="modal likes_modal animated fadeIn" id="modal_post_comment_likes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Colleagues who like this comment</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div id="modal_comment_likes_wrapper">

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-info load_more_post_comment_likes">Load More</a>
      </div>
    </div>
  </div>
</div>
<div id="event"></div>
<div id="newsfeed" class="animated fadeIn hide" >
</div>
<!-- Task modal view -->
<div class="modal fade task-modal-single" id="task-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content data">

    </div>
  </div>
</div>

<!--Add/edit task modal-->
<div id="_task"></div>

<!-- Lead Data Add/Edit-->
<div class="modal fade lead-modal" id="lead-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content data">

    </div>
  </div>
</div>

<div id="timers-logout-template-warning" class="hide">
  <h2 class="bold">Started tasks timers found!<br />Are you sure you want to logout without stopping the timers?</h2>
  <hr />
  <a href="http://localhost/crm/authentication/logout" class="btn btn-danger">Logout</a>
</div>

<!--Lead convert to customer modal-->
<div id="lead_convert_to_customer"></div>

<!--Lead reminder modal-->
<div id="lead_reminder_modal"></div>
<script src="http://localhost/crm/assets/plugins/app-build/vendor.js?v=2.1.1"></script>
<script src="http://localhost/crm/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script src="http://localhost/crm/assets/plugins/datatables/datatables.min.js?v=2.1.1"></script>
<script src="http://localhost/crm/assets/plugins/app-build/moment.min.js"></script>
<script src='http://localhost/crm/assets/plugins/app-build/bootstrap-select.min.js?v=2.1.1'></script>
<script src="http://localhost/crm/assets/plugins/tinymce/tinymce.min.js?v=2.1.1"></script>
<script src='http://localhost/crm/assets/plugins/jquery-validation/jquery.validate.min.js?v=2.1.1'></script>
<script src="http://localhost/crm/assets/plugins/fullcalendar/fullcalendar.min.js?v=2.1.1"></script>
<script src="http://localhost/crm/assets/js/main.min.js?v=2.1.1"></script>
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
         }
     }
 </script>
 <div class="modal fade _event" id="newEventModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add new event</h4>
      </div>
      <form action="http://localhost/crm/admin/utilities/calendar" id="calendar-event-form" method="post" accept-charset="utf-8">
<input type="hidden" name="csrf_token_name" value="c49d74a9b4c3de367b8456cc5c686da8" />           
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
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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

        data.widgets = options;
/*
        if (typeof(csrfData) !== 'undefined') {
            data[csrfData['token_name']] = csrfData['hash'];
        }
*/
        $.post(admin_url+'staff/save_dashboard_widgets_visibility',data).fail(function(data) {
            // Demo usage, prevent multiple alerts
            if($('body').find('.float-alert').length == 0) {
                alert_float('danger', data.responseText);
            }
        });
    });

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
        });
    });
    function fix_user_data_widget_tabs(){
        if((app_user_browser != 'firefox'
                && isRTL == 'false' && is_mobile()) || (app_user_browser == 'firefox'
                && isRTL == 'false' && is_mobile())){
                $('.horizontal-scrollable-tabs ul.nav-tabs-horizontal').css('margin-bottom','26px');
        }
    }
    function init_weekly_payment_statistics(data) {
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
            }

        }
    }
</script>
</body>
</html>
