<aside id="sidebar"
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width"
    aria-label="Sidebar">
    <div class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200">
                <ul class="pb-2 space-y-2">
                    <li>
                        <a href="{{ route('page.dashboard') }}"
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-primaryLight hover:text-primary group {{ Route::is('page.dashboard') ? 'bg-primaryLight text-primary' : '' }}">
                            <i class="bi bi-bar-chart-line px-2"></i>
                            <span class="ml-3" sidebar-toggle-item>Overview</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('page.balance') }}"
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-primaryLight hover:text-primary group {{ Route::is('page.balance') ? 'bg-primaryLight text-primary' : '' }} ">
                            <i class="bi bi-wallet2 px-2"></i>
                            <span class="ml-3" sidebar-toggle-item>My Balance</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('page.page.index') }}"
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-primaryLight hover:text-primary group {{ Route::is('page.page.index') || Route::is('page.unit.index') ? 'bg-primaryLight text-primary' : '' }} ">
                            <i class="bi bi-pencil-square px-2"></i>
                            <span class="ml-3" sidebar-toggle-item>Edit Page</span>
                        </a>
                    </li>
                </ul>
                <div class="pt-2 space-y-2">
                    <a href="{{ route('page.post.index') }}"
                        class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg hover:bg-primaryLight hover:text-primary group {{ Route::is('page.post.index') || Route::is('page.post.create') ? 'bg-primaryLight text-primary' : '' }}">
                        <i class="bi bi-file-text px-2"></i>
                        <span class="ml-3" sidebar-toggle-item>Post</span>
                    </a>
                </div>
                <div class="pt-2 space-y-2">
                    <a href="{{ route('page.support.user') }}"
                        class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg hover:bg-primaryLight hover:text-primary group {{ Route::is('page.support.user') || Route::is('page.support.anonim') ? 'bg-primaryLight text-primary' : '' }}">
                        <i class="bi bi-people px-2"></i>
                        <span class="ml-3" sidebar-toggle-item>My Supporters</span>
                    </a>
                </div>
                <div class="pt-2 space-y-2">
                    <a href="#" onclick="confirmLogout()"
                        class="flex items-center p-2 text-base transition duration-75 rounded-lg">
                        <button type="button"
                            class="text-gray-900 w-full bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2">Logout</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</aside>

<div class="fixed inset-0 z-10 hidden bg-gray-900/50 " id="sidebarBackdrop"></div>
