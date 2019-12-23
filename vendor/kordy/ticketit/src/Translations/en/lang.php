<?php

return [

 /*
  *  Constants
  */

  'nav-active-tickets'               => 'Active Jobs',
  'nav-completed-tickets'            => 'Completed Jobs',

  // Tables
  'table-id'                         => '#',
  'table-subject'                    => 'Subject',
  'table-owner'                      => 'Owner',
  'table-status'                     => 'Status',
  'table-last-updated'               => 'Last Updated',
  'table-priority'                   => 'Priority',
  'table-agent'                      => 'Technical Personal',
  'table-category'                   => 'Category',

  // Datatables
  'table-decimal'                    => '',
  'table-empty'                      => 'No data available in table',
  'table-info'                       => 'Showing _START_ to _END_ of _TOTAL_ entries',
  'table-info-empty'                 => 'Showing 0 to 0 of 0 entries',
  'table-info-filtered'              => '(filtered from _MAX_ total entries)',
  'table-info-postfix'               => '',
  'table-thousands'                  => ',',
  'table-length-menu'                => 'Show _MENU_ entries',
  'table-loading-results'            => 'Loading...',
  'table-processing'                 => 'Processing...',
  'table-search'                     => 'Search:',
  'table-zero-records'               => 'No matching records found',
  'table-paginate-first'             => 'First',
  'table-paginate-last'              => 'Last',
  'table-paginate-next'              => 'Next',
  'table-paginate-prev'              => 'Previous',
  'table-aria-sort-asc'              => ': activate to sort column ascending',
  'table-aria-sort-desc'             => ': activate to sort column descending',

  'btn-back'                         => 'Back',
  'btn-cancel'                       => 'Cancel', // NEW
  'btn-close'                        => 'Close',
  'btn-delete'                       => 'Delete',
  'btn-edit'                         => 'Edit',
  'btn-mark-complete'                => 'Mark Complete',
  'btn-submit'                       => 'Submit',
  'btn-technician-form'              => 'Technician Form',

  'agent'                            => 'Agent',
  'category'                         => 'Category',
  'colon'                            => ': ',
  'comments'                         => 'Comments',
  'created'                          => 'Created',
  'created-date'                     => 'Created Date',
  'created-time'                     => 'Created Time',
  'completed-date'                   => 'Completed Date',
  'completed-time'                   => 'Completed Time',
  'description'                      => 'Description',
  'flash-x'                          => '×', // &times;
  'last-update'                      => 'Last Update',
  'no-replies'                       => 'No replies.',
  'owner'                            => 'Owner',
  'priority'                         => 'Priority',
  'reopen-ticket'                    => 'Reopen Ticket',
  'reply'                            => 'Reply',
  'responsible'                      => 'Responsible',
  'status'                           => 'Status',
  'subject'                          => 'Subject',
  'created_date'                     => 'Created Date',
  'created_time'                     => 'Created Time',
  'report_details'                   => 'Report Details',
  'picture_and_remarks'              => 'Picture And Remarks',
  'outlet_id'                        => 'Outlet ID',
  'report_no'                        => 'Report No.',
  'report_date'                      => 'Report Date',
  'report_time'                      => 'Report Time',
  'action'                           => 'Action',
  'assigned_technician'              => 'Assigned Technician',
  'technical_remarks'                => 'Technical Remarks',
  'complaint_by'                     => 'Complaint By',
  'in_progress_picture_remarks'      => "In Progress",
  'after_picture_remarks'            => "After",
  'position'                         => "Position",
  


 /*
  *  Page specific
  */

// ____
  'index-title'                      => 'Helpdesk main page',

// tickets/____
  'index-my-tickets'                 => 'My Job',
  'btn-create-new-ticket'            => 'Create new job',
  'index-complete-none'              => 'There are no complete tickets',
  'index-active-check'               => 'Be sure to check Active Tickets if you cannot find your ticket.',
  'index-active-none'                => 'There are no active tickets,',
  'index-create-new-ticket'          => 'create new ticket',
  'index-complete-check'             => 'Be sure to check Complete Tickets if you cannot find your ticket.',

  'create-ticket-title'              => 'New Ticket Form',
  'create-new-ticket'                => 'Create New Job',
  'create-ticket-brief-issue'        => 'A brief of your issue ticket',
  'create-ticket-describe-issue'     => 'Describe your issue here in details',
  'create-ticket-created-date'       => 'Job creation date',
  'create-ticket-created-time'       => 'Job creation time',
  'create-ticket-picture_remarks'    => 'Upload your picture and put some remarks',
  'create-ticket-complaint-by'       => 'Enter your name',
  'create-ticket-position'           => 'Enter your position in outlet',


  'show-ticket-title'                => 'Ticket',
  'show-ticket-js-delete'            => 'Are you sure you want to delete: ',
  'show-ticket-modal-delete-title'   => 'Delete Ticket',
  'show-ticket-modal-delete-message' => 'Are you sure you want to delete ticket: :subject?',

 /*
  *  Controllers
  */

// AgentsController
  'agents-are-added-to-agents'                      => 'Agents :names are added to agents',
  'administrators-are-added-to-administrators'      => 'Administrators :names are added to administrators', //New
  'agents-joined-categories-ok'                     => 'Joined categories successfully',
  'agents-is-removed-from-team'                     => 'Removed agent\s :name from the agent team',
  'administrators-is-removed-from-team'             => 'Removed administrator\s :name from the administrators team', // New

// CategoriesController
  'category-name-has-been-created'   => 'The category :name has been created!',
  'category-name-has-been-modified'  => 'The category :name has been modified!',
  'category-name-has-been-deleted'   => 'The category :name has been deleted!',

// PrioritiesController
  'priority-name-has-been-created'   => 'The priority :name has been created!',
  'priority-name-has-been-modified'  => 'The priority :name has been modified!',
  'priority-name-has-been-deleted'   => 'The priority :name has been deleted!',
  'priority-all-tickets-here'        => 'All priority related tickets here',

// StatusesController
  'status-name-has-been-created'   => 'The status :name has been created!',
  'status-name-has-been-modified'  => 'The status :name has been modified!',
  'status-name-has-been-deleted'   => 'The status :name has been deleted!',
  'status-all-tickets-here'        => 'All status related tickets here',

// UsersController
  'user-name-has-been-created'   => 'The user :name has been created!',


// CommentsController
  'comment-has-been-added-ok'        => 'Comment has been added successfully',

// NotificationsController
  'notify-new-comment-from'          => 'New comment from ',
  'notify-on'                        => ' on ',
  'notify-status-to-complete'        => ' status to Complete',
  'notify-status-to'                 => ' status to ',
  'notify-transferred'               => ' transferred ',
  'notify-to-you'                    => ' to you',
  'notify-created-ticket'            => ' created ticket ',
  'notify-updated'                   => ' updated ',

 // TicketsController
  'the-ticket-has-been-created'      => 'The ticket has been created!',
  'the-ticket-has-been-modified'     => 'The ticket has been modified!',
  'the-ticket-has-been-deleted'      => 'The ticket :name has been deleted!',
  'the-ticket-has-been-completed'    => 'The ticket :name has been completed!',
  'the-ticket-has-been-reopened'     => 'The ticket :name has been reopened!',
  'you-are-not-permitted-to-do-this' => 'You are not permitted to do this action!',

 /*
 *  Middlewares
 */

 //  IsAdminMiddleware IsAgentMiddleware ResAccessMiddleware
  'you-are-not-permitted-to-access'     => 'You are not permitted to access this page!',

];
