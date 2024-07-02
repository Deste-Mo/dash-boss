<div id="contact" class=" section-padding box-container w-full flex justify-center items-center flex-col gap-[64px]">
    <div class="max-sm:w-full w-[660px] items-center flex flex-col gap-10" id="contact-title-container">
        <h1 class="text-title-1 text-white-100 w-full text-center max-sm:text-title-2">
            Nous
            <span class="text-primary-100 text-[96px] max-sm:text-title-2">Contactez</span>
        </h1>
    </div>
    <ul class="flex items-center gap-10 max-sm:justify-between justify-evenly  overflow-x-scroll w-full hide-scroll">
        <li class="btn-icon icon-white ">
            <a class="" href="#"><i class="bi bi-facebook text-black-100 text-[24px]"></i></a>
        </li>
        <li class="btn-icon icon-white">
            <a class="" href="#"><i class="bi bi-twitter text-black-100 text-[24px]"></i></a>
        </li>
        <li
            class="text-primary-100 text-lead bg-primary-10 rounded-3xl px-4 py-2 border border-primary-100  text-nowrap">
            <i class="bi bi-phone"></i>
            <span class="text-nowrap">020 78 843 67</span>
        </li>
        <button class="btn-lg btn-primary">
            <i class="bi bi-envelope-at"><span>njcamsystem@gmail.com</span></i>
        </button>
        <li class="btn-icon icon-white">
            <a class="" href="#"><i class="bi bi-dribbble text-black-100 text-[24px]"></i></a>
        </li>
        <li class="btn-icon icon-white">
            <a class="" href="#"><i class="bi bi-linkedin text-black-100 text-[24px]"></i></a>
        </li>
    </ul>
    <form id="contact-form" class="relative flex flex-col gap-6 items-start w-[420px] max-sm:w-full">
        <div class="absolute top-[50%] right-0">
            <h4 class="py-3 px-5 rounded-2xl text-base text-white-100 bg-success-80 translate-[-50%]" id="notifMessage">
            </h4>
        </div>
        <div class="flex flex-col gap-4 w-full">
            <label for="nom" class="text-white-100 text-base">Nom :</label>
            <input required type="text" name="nom" id="nom" class="input-lg w-full " placeholder="Entrer votre nom">
        </div>
        <div class="flex flex-col gap-4 w-full">
            <label for="email" class="text-white-100 text-base">Email :</label>
            <input required type="email" name="email" id="email" class="input-lg w-full"
                placeholder="Entrer votre email">
        </div>
        <div class="flex flex-col gap-4 w-full">
            <label for="message" class="text-white-100 text-base">Message :</label>
            <textarea name="message" id="message" class="input-lg max-sm:w-full resize-none h-[220px]"
                placeholder="Entrer votre message" required></textarea>
        </div>
        <button type="button" onclick="handleSubmit()" class="btn-lg btn-white w-full text-center">Envoyer</button>
    </form>
</div>

<script>

    $(document).ready(function () {
        $('#notifMessage').hide();
    });

    function clearInputs() {
        $('#nom').val("");
        $('#email').val("");
        $('#message').val("");
    }
    function handleSubmit() {

        name = $('#nom').val();
        email = $('#email').val();
        message = $('#message').val();

        $.ajax({
            type: "post",
            url: "src/controllers/sendMessage.php",
            data: {
                sendName: name,
                sendEmailVisitor: email,
                sendMessage: message
            },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    $('#notifMessage').text(response.success).fadeIn().delay(3000).fadeOut();
                    clearInputs();
                } else {
                    $('#notifMessage').text(response.error).fadeIn().delay(3000).fadeOut();
                    clearInputs();
                }
            }
        });
    }

</script>