<nav>
    <ul class="nav nav-pills">
        <li role="presentation" class="nav-item">
            <a class="nav-link {!! $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\TicketsController@index')) ? "active" : "" !!}"
                href="{{ action('\Kordy\Ticketit\Controllers\TicketsController@index') }}">{{ trans('ticketit::lang.nav-active-tickets') }}
                <span class="badge badge-pill badge-secondary ">
                     <?php 
                        if ($u->isAdmin()) {
                            echo Kordy\Ticketit\Models\Ticket::active()->count();
                        } elseif ($u->isAgent()) {
                            echo Kordy\Ticketit\Models\Ticket::active()->agentUserTickets($u->id)->count();
                        } else {
                            echo Kordy\Ticketit\Models\Ticket::userTickets($u->id)->active()->count();
                        }
                    ?>
                </span>
            </a>
        </li>
        <li role="presentation" class="nav-item">
            <a class="nav-link {!! $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\TicketsController@indexComplete')) ? "active" : "" !!}"
                 href="{{ action('\Kordy\Ticketit\Controllers\TicketsController@indexComplete') }}">{{ trans('ticketit::lang.nav-completed-tickets') }}
                <span class="badge badge-pill badge-secondary">
                    <?php 
                        if ($u->isAdmin()) {
                            echo Kordy\Ticketit\Models\Ticket::complete()->count();
                        } elseif ($u->isAgent()) {
                            echo Kordy\Ticketit\Models\Ticket::complete()->agentUserTickets($u->id)->count();
                        } else {
                            echo Kordy\Ticketit\Models\Ticket::userTickets($u->id)->complete()->count();
                        }
                    ?>
                </span>
            </a>
        </li>

        @if($u->isAdmin())
            <li role="presentation" class="nav-item">
                <a class="nav-link {!! $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\DashboardController@index')) || Request::is($setting->grab('admin_route').'/indicator*') ? "active" : "" !!}"
                    href="{{ action('\Kordy\Ticketit\Controllers\DashboardController@index') }}">{{ trans('ticketit::admin.nav-dashboard') }}</a>
            </li>

            <li role="presentation" class="nav-item dropdown">

                <a class="nav-link dropdown-toggle {!!
                    $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\UsersController@index').'*') ||
                    $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\PrioritiesController@index').'*') ||
                    $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\AgentsController@index').'*') ||
                    $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\ConfigurationsController@index').'*') ||
                    $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\AdministratorsController@index').'*')
                    ? "active" : "" !!}"
                    data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    {{ trans('ticketit::admin.nav-settings') }}
                </a>
                <div class="dropdown-menu">

                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\UsersController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Kordy\Ticketit\Controllers\UsersController@index') }}">{{ trans('ticketit::admin.nav-users') }}</a>

                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\PrioritiesController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Kordy\Ticketit\Controllers\PrioritiesController@index') }}">{{ trans('ticketit::admin.nav-priorities') }}</a>
                    
                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\AgentsController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Kordy\Ticketit\Controllers\AgentsController@index') }}">{{ trans('ticketit::admin.nav-agents') }}</a>
                    
                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\ConfigurationsController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Kordy\Ticketit\Controllers\ConfigurationsController@index') }}">{{ trans('ticketit::admin.nav-configuration') }}</a>
                    
                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\AdministratorsController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Kordy\Ticketit\Controllers\AdministratorsController@index')}}">{{ trans('ticketit::admin.nav-administrator') }}</a>
                    
                </div>
            </li>
        @endif

    </ul>
</nav>