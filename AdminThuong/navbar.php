<style>
	a:hover{color: white; text-decoration: none}
</style>
<ul id="dropdown1" class="dropdown-content">
  <li><a href="ThongTinCaNhan.php">Thông Tin Cá Nhân</a></li>
  <li class="divider"></li>
  <li><a href="logoutprocess.php">Đăng Xuất</a></li>
</ul>
<nav class="brown darken-2">
  <div class="nav-wrapper">
    <a href="#!" class="brand-logo">Logo</a>
    <ul class="right hide-on-med-and-down">
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Chào <?php echo($_SESSION["user"]) ?><i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>