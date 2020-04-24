<section class="banner-area organic-breadcrumb">
  <div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
      <div class="col-first"> 
        <nav class="d-flex align-items-center">
        </nav>
      </div>
    </div>
  </div>
</section>
<section class="sample-text-area">
  <div class="text-center">
    <form class="row contact_form" method="post">
      <div class="col-md-12 text-center">
      <script src="https://js.paystack.co/v1/inline.js"></script>
        <button type="button" onclick="payWithPaystack()" class="primary-btn">Pay using Paystack</button>
      </div>
    </form>
  </div>

  <!-- <script>
    var cus_email = localStorage.getItem("Email");
    var total = localStorage.getItem("Total");
    var total_amount = parseInt(total)
    var cus_name = localStorage.getItem("Name");
    function payWithPaystack(){
      var handler = PaystackPop.setup({
        key: 'pk_test_86d32aa1nV4l1da7120ce530f0b221c3cb97cbcc',
        email: cus_email,
        amount: total_amount,
        currency: "NGN",
        firstname: cus_name,
        // label: "Optional string that replaces customer email"
        metadata: {
          custom_fields: [
            {
              display_name: "Mobile Number",
              variable_name: "mobile_number",
              value: "+2348012345678"
            }
          ]
        },
        callback: function(response){
            alert('success. transaction ref is ' + response.reference);
        },
        onClose: function(){
          alert('Closed');
        }
      });
      handler.openIframe();
    }
  </script> -->
  <script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_86d32aa1nV4l1da7120ce530f0b221c3cb97cbcc',
      email: 'customer@email.com',
      amount: 10000,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      firstname: 'Stephen',
      lastname: 'King',
      // label: "Optional string that replaces customer email"
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>
</section>
