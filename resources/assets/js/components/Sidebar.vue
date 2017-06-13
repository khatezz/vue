<template>
    <div>
        <aside id="sidebar" class="sidebar c-overflow">
            <div class="s-profile">
                <a href="#" data-ma-action="profile-menu-toggle">
                    <div class="sp-pic">
                        <img src="/assets/img/demo/profile-pics/1.jpg" alt="">
                    </div>

                    <div class="sp-info">
                       Admin Admin

                        <i class="zmdi zmdi-caret-down"></i>
                    </div>
                </a>

                <ul class="main-menu">
                    <li>
                        <a href="javascript:;"><i class="zmdi zmdi-time-restore"></i> Logout</a>
                    </li>
                </ul>
            </div>

            <ul class="main-menu">
                <li class="sub-menu">
                    <a href="#" data-ma-action="submenu-toggle"><i class="zmdi zmdi-account-circle"></i> Users</a>

                    <ul>
                        <router-link tag="li" to="/usermanagement">
                            <a>User Management</a>
                        </router-link>
                       
                         <router-link tag="li" to="/usergroup">
                            <a>User Group</a>
                        </router-link>
                    </ul>
                </li>
               
                <li class="sub-menu">
                    <a href="#" data-ma-action="submenu-toggle"><i class="zmdi zmdi-view-list-alt"></i> Fields</a>

                    <ul>
                        <router-link tag="li" to="/field">
                            <a>Fields</a>
                        </router-link>
                        <router-link tag="li" to="/fieldgroup">
                            <a>Field Group</a>
                        </router-link>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#" data-ma-action="submenu-toggle"><i class="zmdi zmdi-help-outline"></i> Questionaire</a>

                    <ul>

                        <router-link tag="li" to="/questionairetype">
                            <a>Types</a>
                        </router-link>
                         <router-link tag="li" to="/questionairepage">
                            <a>Pages</a>
                        </router-link>
                    </ul>
                </li>
                <li><a href="javascript:;"><i class="zmdi zmdi-file"></i> Exams</a></li>
                <li><a href="javascript:;"><i class="zmdi zmdi-accounts"></i> Applicants</a></li>
            </ul>
        </aside>

    </div>
</template>


<script>
    export default{

    }
</script>