
<nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/lgo.png" alt="">
            </div>

            <span class="logo_name">Admin</span>
        </div>
    
        <div class="menu-items">
            <ul class="nav-links">
                
                <li><a href="dashbord.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">لوحة التحكم</span>
                </a></li>
                <?php if($_SESSION["groupid"]==1){?>
                <li><a href="membres.php?do=Manage">
                    <i class="uil uil-users-alt"></i>
                    <span class="link-name">الاعضاء</span>
                </a></li>
                <li><a href="donations.php?do=Manage">
                    <i class="uil uil-usd-circle"></i>
                    <span class="link-name">التبرعات</span>
                </a></li><?php } ?>
                <li><a href="articles.php?do=Manage">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">المحتوى</span>
                </a></li>
                <li><a href="events.php?do=Manage">
                    <i class="uil uil-award"></i>
                    <span class="link-name">الأحداث</span>
                </a></li>
                <li><a href="settings.php">
                    <i class="uil uil-setting"></i>
                    <span class="link-name">الإعدادات الشخصية</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="Logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">تسجيل الخروج</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">نمط الليلي</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>