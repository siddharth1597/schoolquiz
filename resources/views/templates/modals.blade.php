<!--Contact-us Modal -->

<div class="modal fade" id="ContactUsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog size_modal" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CUSTOMIZE CONTACT-US</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <input type="text" class="form-control" id="contact_title" placeholder="Title" required>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <div class="d-flex">
                <div class="custom-file">
                  <input required type="file" class="custom-file-input" onchange="image_file(event, this.id)" id="contact_image" name="customFile" />
                  <label class="custom-file-label" for="customFile" id="contact_images">Choose image</label>
                  <small id="upload_msg_proof d-none" class="form-text">
                  </small>
                </div>
                <input type="button" name="upload" id="upload_contact_image" class="btn btn-success ml-2" value="Upload">
              </div>
              <img class="mt-2 w-50 mx-auto d-none" src="" alt="profile image">
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="contact_name" placeholder="Name" required>
              <input type="text" class="form-control mt-3" id="contact_designation" placeholder="Designation" required>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
              </div>
              <input required type="email" class="form-control" id="contact_email" placeholder="Enter Email-Id" name="email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="contact_address" placeholder="Address Line" required>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="contact_city" placeholder="City" required>
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="contact_pincode" placeholder="PinCode" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend">
                    <i class="fab fa-whatsapp text-success"></i>
                  </span>
                </div>
                <input required type="tel" class="form-control" id="contact_whatsapp" placeholder="WhatsApp number">
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend">
                    <i class="fa fa-phone-alt"></i>
                  </span>
                </div>
                <input required type="tel" class="form-control" id="contact_mobile" placeholder="Mobile Number">
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <div class="d-flex">
                <div class="custom-file">
                  <input required type="file" class="custom-file-input" onchange="image_file(event, this.id)" id="contact_icon" name="customFile" />
                  <label class="custom-file-label" for="customFile" id="contact_icons">Choose home icon</label>
                  <small id="upload_msg_proof d-none" class="form-text">
                  </small>
                </div>
                <input type="button" name="upload" id="upload_contact_icon" class="btn btn-success ml-2" value="Upload">
              </div>
            </div>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button id='update_details' onclick='updateContactUs()' class="btn btn-primary">Save data</button>
        <button class="btn btn-secondary" onclick="Reset()">Reset</button>
      </div>
    </div>
  </div>
</div>
