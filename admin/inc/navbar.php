  <!-- navabar section start here -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded-pill px-4">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="navbar()">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">OCRS</a>
    <button class="btn btn-outline-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</button>
  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to logout ??
      </div>
      <div class="modal-footer">
        <a name="" id="" class="btn btn-primary " href="process/logout.php" role="button">Yes</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
