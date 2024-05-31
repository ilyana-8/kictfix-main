<aside class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <!DOCTYPE html>
    <html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {font-family: "Lato", sans-serif;}

    .sidebar {
      height: 100%;
      width: 250px; /* Increased width to accommodate the logo */
      position: fixed;
      z-index: 500;
      top: 0;
      left: 0;
      background-color: #051744;
      overflow-x: hidden;
      padding-top: 20px; /* Increased padding to accommodate the logo */
    }

    .sidebar a {
      padding: 8px 8px 8px 16px;
      text-decoration: none;
      font-size: 18px;
      color: #b3b3b3;
      display: block;
    }

    .sidebar a.user {
      padding: 4px 8px 4px 16px; /* Adjusted padding for user links */
      font-size: 16px; /* Smaller font size for user links */
    }

    .sidebar a.report {
      padding: 4px 8px 4px 16px; /* Adjusted padding for report links */
      font-size: 16px; /* Smaller font size for report links */
    }

    .sidebar .section-title {
      padding: 8px 8px 8px 16px; /* Adjusted padding for section titles */
      font-size: 20px; /* Larger font size for section titles */
      color: #fff; /* White color for section titles */
    }

    .sidebar .section-title.small {
      font-size: 14px; /* Smaller font size for section titles */
    }

    .sidebar-divider {
      border-top: 1px solid #666; /* Line divider style */
      margin-top: 20px; /* Space between sections */
    }

    .sidebar-logo {
      text-align: center;
    }

    .sidebar-logo img {
      width: 90%; /* Adjust the logo size as needed */
      margin-bottom: 10px; /* Space below the logo */
    }

    </style>
    </head>
    <body>

    <div class="sidebar">
      <div class="sidebar-logo">
        <img src="/KICTFix.png" alt="Logo">
      </div>

      <!-- Divider between logo and user section -->
      <div class="sidebar-divider"></div>

      <!-- User Section -->
      <div class="section-title small">User</div> <!-- Section title -->
      <a href="{{ route('technician.profile') }}" id="profile-link"><i class="fa fa-fw fa-user"></i> My Profile</a>
      <a href="{{ route('technician.editProfile') }}" id="profile-link"><i class="fa fa-fw fa-edit"></i> Edit Profile</a>
      <a href="{{ route('technician.changePassword') }}" id="profile-link"><i class="fa fa-fw fa-wrench"></i> Change Password</a>

      <!-- Divider between user and report section -->
      <div class="sidebar-divider"></div>

      <!-- Report Section -->
      <div class="section-title small">Report</div> <!-- Section title -->
      <a href="{{route('technician.manageReport')}}" id="profile-link"><i class="fa fa-fw fa-plus"></i> Manage Report</a>
    </div>

    </body>
    </html>
    </aside>
