<div class="modal fade" id="userModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modal-title" class="modal-title" id="staticBackdropLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" id="form-modal" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <input type="hidden" class="form-control" name="user_id" id="user_id">
                        <label for="firstname" class="col-sm-4 col-form-label">First Name</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" name="firstname" id="firstname" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="lastname" class="col-sm-4 col-form-label">Last Name</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" name="lastname" id="lastname" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                        <div class="col-sm-8">
                            <select id="gender" class="form-select" aria-label="" name="gender" required>
                                <option selected> -Select- </option>
                                <?php foreach($genders as $gender): ?>
                                        <option value="<?= $gender->gender_id; ?>"><?= $gender->gender; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="birthday" class="col-sm-4 col-form-label">Birthday</label>
                        <div class="col-sm-8">
                        <input type="date" class="form-control" name="birthday" id="birthday" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="salary" class="col-sm-4 col-form-label">Monthly Salary</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" name="salary" id="salary" required>
                        </div>
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-add">Add</button>
                    <button type="submit" class="btn btn-primary" id="btn-update">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" id="delete-modal" method="POST">
            @csrf
        <input type="hidden" class="form-control" name="delete_user_id" id="delete_user_id">
        <div class="modal-body">
            <p>Are you sure you want to delete this record?</p>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Yes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        </div>
      </form>
    </div>
  </div>
</div>