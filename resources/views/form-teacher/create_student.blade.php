<div class="modal fade" id="createStudenModal" tabindex="-1" role="dialog" aria-labelledby="createStudenModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createStudenModalLabel">Create student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('store-student') }}" method="POST">
              @csrf
              <div class="form-group">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-code">Code</span>
                    </div>
                    <input type="text" name="code" class="form-control" required>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-name">Name</span>
                    </div>
                    <input type="text" name="name" class="form-control" required>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-date-of-birth">Date of birth</span>
                    </div>
                    <input type="date" name="dateOfBirth" class="form-control" required>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-email">Email</span>
                    </div>
                    <input type="email" name="email" class="form-control"  required>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-password">Password</span>
                    </div>
                    <input type="password" name="password" class="form-control" required>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>
