<!-- Modal -->
<div class="modal fade" id="createCourseModal" tabindex="-1" role="dialog" aria-labelledby="createCourseModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createCourseModalLabel">Create course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent action="{{ route('store-course') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="courseName">Name</label>
            <input type="text" class="form-control" id="courseName" name='name' placeholder="Course's name">
          </div>
          <div class="form-group">
            <label for="courseDetail">Detail</label>
            <input type="text" class="form-control" id="courseDetail" name="detail" placeholder="Course's detail">
          </div>
          <div class="form-group">
            <label for="courseDetail">Teacher</label>
            <select class="custom-select" name="teacher">
              <option selected>Open this select menu</option>
              @foreach ($subTeachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="courseStartDate">Start date</label>
              <input type="date" class="form-control" id="courseStartDate" name='startDate' placeholder="Course's start date">
            </div>
            <div class="col">
              <label for="courseEndDate">End date</label>
              <input type="date" class="form-control" id="courseEndDate" name='endDate' placeholder="Course's end date">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
