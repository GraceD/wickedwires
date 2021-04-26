<?=template_header('Contact')?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>contact form</title>
</head>

<body>

<link href="contact-form.css" rel="stylesheet">

<div class="fcf-body">

    <div id="fcf-form">
    <h3 class="fcf-h3">Contact me!</h3>

    <form id="fcf-form-id" class="fcf-form-class" method="post" action="contact-form-process.php">
        
        <div class="fcf-form-group">
            <label for="name" class="fcf-label">Your name</label>
            <div class="fcf-input-group">
                <input type="text" id="name" name="name" class="fcf-form-control" required>
            </div>
        </div>

        <div class="fcf-form-group">
            <label for="email" class="fcf-label">Your email address</label>
            <div class="fcf-input-group">
                <input type="email" id="email" name="email" class="fcf-form-control" required>
            </div>
        </div>

        <div class="fcf-form-group">
            <label for="message" class="fcf-label">Your message</label>
            <div class="fcf-input-group">
                <textarea id="msg" name="msg" class="fcf-form-control" rows="6" maxlength="3000" required></textarea>
            </div>
        </div>

        <div class="fcf-form-group">
            <button type="submit" name="submit" id="submit" value="send" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block" style = "background-color: #ffc779;">Send Message</button>
        </div>


    </form>
    </div>
	

</div>

<?=template_footer()?>