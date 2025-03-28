<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Food Coupon for CONVERGENCE 2025</title>
  <style type="text/css">
    /* Base styles */
    body, html {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      line-height: 1.5;
      color: #333;
      background-color: #f5f5f5;
    }
    
   
    /* Responsive adjustments */
    @media only screen and (max-width: 600px) {
      .email-container {
        width: 100% !important;
      }
      .responsive-image {
        width: 100% !important;
        height: auto !important;
      }
      .mobile-padding {
        padding: 10px !important;
      }
     
    }
  </style>
</head>
<body style="margin: 0; padding: 0; background-color: #f5f5f5; font-family: Arial, Helvetica, sans-serif;">
  <!-- Email wrapper -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f5f5f5">
    <tr>
      <td align="center" style="padding: 20px 0;">
        <!-- Email container -->
        <table class="email-container" width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
          <!-- Header -->
          <tr>
            <td bgcolor="#4d6a3b" style="padding: 30px 20px; text-align: center; color: #ffffff; border-radius: 8px 8px 0 0;">
              <h1 style="margin: 0; font-size: 24px; font-weight: bold;">CONVERGENCE 2025</h1>
              <p style="margin: 5px 0 0; opacity: 0.9;">SEMCOM Conference</p>
            </td>
          </tr>
          
          <!-- Content -->
          <tr>
            <td class="mobile-padding" style="padding: 30px;">
              <!-- Greeting -->
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td style="text-align: center; padding-bottom: 20px;">
                    <h2 style="margin: 0 0 15px; font-size: 20px; color: #333333;">Your Food Coupon is Ready!</h2>
                    <p style="margin: 0 0 15px; color: #666666;">Dear {{$name}},</p>
                    <p style="margin: 0 0 25px; color: #666666;">We're excited to have you join us for CONVERGENCE 2025! Your exclusive food coupon is attached below.</p>
                  </td>
                </tr>
              </table>
              
              <!-- Coupon Image -->
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="position: relative;">
  <tr>
    <td align="center" style="position: relative;">

      <img class="responsive-image" src="https://i.ibb.co/KzLmSfm3/Whats-App-Image-2025-03-23-at-16-23-49-0be97bb2.jpg" 
           alt="Food Coupon for CONVERGENCE 2025" width="550" 
           style="display: block; border: 1px solid #e0e0e0; border-radius: 6px; max-width: 100%;">
      
      <!-- QR Code (Overlapping using table) -->
      <div >
        <img class="qrcode" src="https://api.qrserver.com/v1/create-qr-code/?size=170x170&data={{$email}}" 
             alt="QR Code" >
      </div>
    </td>
  </tr>
</table>

              
              <!-- Instructions Card -->
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 25px; background-color: #fff8e1; border: 1px solid #ffe0b2; border-radius: 6px;">
                <tr>
                  <td style="padding: 20px; text-align: center;">
                    <p style="margin: 0; color: #b45309; font-weight: 500;">
                      🎉 Your exclusive food coupon is ready! 🍽 Just bring this soft copy during lunch & breakfast—our student volunteers will scan it, and you're all set to enjoy your meal! 😋📲 Bon appétit!
                    </p>
                  </td>
                </tr>
              </table>
              
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>