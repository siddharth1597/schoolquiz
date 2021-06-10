var url = $('meta[name=url]').attr('content');

$(document).ready(function() {

  $('.upload_image').on('click', function() {

    var $this = $(this);
    var image_file = '';
    var image_type = $this.prev().find('.image_file').attr('data-type');
    alert(image_type);
    if (image_type == 'icon') {
      image_file = document.getElementById('contact_icon').files[0];
    }
    else {
      image_file = document.getElementById('contact_image').files[0];
    }
    var form_data = new FormData();
    form_data.append("image", image_file);
    form_data.append("image_type", image_type);

    $.ajax({
      url: url + "/imageUpload",
      method:"POST",
      data: form_data,
      dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,

      success:function(data)
      {
        if (data.class_name == 'text-success') {
          $this.parent().next().removeClass('d-none').attr('src', data.image_url);
          $this.closest('#upload_msg_proof').addClass(data.class_name).removeClass('text-danger').html(data.message);
        }
        else {
          $this.closest('#upload_msg_proof').addClass(data.class_name).removeClass('text-success').html(data.message);
        }
        $this.closest('#upload_msg_proof').show();
      }
    });
  });
});

function readURL(event, input) {
  var output = document.getElementById(input);
  output.innerHTML = event.target.files[0].name;
}

function image_file(event, id) {
  readURL(event, id + 's');
}

function updateContactUs() {
  var title = document.getElementById('contact_title').value;
  var name = document.getElementById('contact_name').value;
  var designation = document.getElementById('contact_designation').value;
  var email = document.getElementById('contact_email').value;
  var address = document.getElementById('contact_address').value;
  var city = document.getElementById('contact_city').value;
  var pincode = document.getElementById('contact_pincode').value;
  var whatsapp_no = document.getElementById('contact_whatsapp').value;
  var phone_no = document.getElementById('contact_mobile').value;
  
  if (title && name && designation && email && address && city && pincode && whatsapp_no && phone_no) {
      
    $.ajax({
      type: 'POST',
      url: url + '/dashboard/contact',
      data: {
        'title': title,
        'name': name,
        'designation': designation,
        'email': email,
        'address': address,
        'city': city,
        'pincode': pincode,
        'whatsapp_no': whatsapp_no,
        'phone_no': phone_no
      },
      success: function(data) {
        if ('success' in data) {
          if (data.success === 'yes') {
            window.location = "/dashboard";
          }
        }
        else {
          alert('Something went wrong.');
        }
      }
    });
  }
  else {
    alert('All fields required');
  }
}