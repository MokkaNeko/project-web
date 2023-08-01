<style>
.navbar {
  position: fixed;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  background-color: #f2f2f2;
  border-top: 1px solid #ddd;
  width: 400px;
  height: 60px;
  border-top-left-radius: 30px;
  border-top-right-radius: 30px;
  display: flex;
  justify-content: space-around;
  align-items: center;
  transition: opacity 0.3s;
  opacity: 1;
}

.navbar.hidden {
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.3s, height 0.3s;
  height: 0;
}

.navbar a {
  text-decoration: none;
  color: #333;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.navbar a img {
  width: 25px;
  height: 25px;
  margin-bottom: 5px;
}

.footer {
  bottom: 0;
  text-align: center;
  background-color: #ffffff;
  padding: 20px;
  bottom: 0;
  color: #333333;
  font-size: 14px;
}
</style>
<div class="navbar" id="navbar">
  <a href="#">
    <img src="img/schedule.png" alt="schedule">
    schedule
  </a>
  <a href="dashboard_member.php">
    <img src="img/house.png" alt="home">
    home
  </a>
  <a href="page_tugas.php">
    <img src="img/clipboard.png" alt="task">
    task
  </a>
</div>
<div class="footer">
  &copy; 2023 MyClass. All rights reserved.
</div>