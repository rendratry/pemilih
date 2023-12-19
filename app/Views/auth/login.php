<?php echo $this->include('master_partial/dashboard/header'); ?>
<main role="main" class="main-content">
<body class="light ">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form method="POST" action="<?= base_url('login-in') ?>" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
          <img src="<?= base_url('../assets/assets/images/kotak-suara.png') ?>" alt="" width="100" height="100">
              <g>
                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
              </g>
            </svg>
          </a>
          <h1 class="h6 mb-3">Sign in</h1>
          <div class="form-group">
            <label for="inputEmail" class="sr-only">Username</label>
            <input name="username" type="text" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" required="" autofocus="">
          </div>
          <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input name="password" type="password" id="inputPassword" class="form-control form-control-lg" placeholder="Password" required="">
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Stay logged in </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
          <p class="mt-5 mb-3 text-muted">© Pemilih 2023</p>
        </form>
      </div>
    </div>
  </body>
<?php echo $this->include('master_partial/dashboard/footer'); ?>