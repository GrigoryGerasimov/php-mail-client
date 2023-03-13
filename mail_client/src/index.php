<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="IE=edge, chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="keywords" content="mail, client, php">
        <meta name="description" content="Mail client in PHP">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Mail client in PHP</title>
    </head>
    <body class="w-screen h-screen">
        <main class="w-full h-full flex flex-row justify-center items-center text-3xl">
            <form action="sent.php" method="POST" class="w-[50%] h-[50%] flex flex-col">
                <section class="my-[10px] flex flex-row wrap">
                    <label for="from" class="mr-[30px]">From</label>
                    <input type="email" id="from" name="from" class="flex-grow px-[20px] appearance-none outline-none border-b"/>
                </section>
                <section class="my-[10px] flex flex-row wrap">
                    <label for="to" class="mr-[30px]">To</label>
                    <input type="email" id="to" name="to" class="flex-grow px-[20px] appearance-none outline-none border-b"/>
                </section>
                <section class="my-[10px] flex flex-row wrap">
                    <label for="reply-to" class="mr-[30px]">Reply To</label>
                    <input type="email" id="reply-to" name="reply-to" class="flex-grow px-[20px] appearance-none outline-none border-b"/>
                </section>
                <section class="my-[10px] flex flex-row wrap">
                    <label for="cc" class="mr-[30px]">CC</label>
                    <input type="email" id="cc" name="cc" class="flex-grow px-[20px] appearance-none outline-none border-b"/>
                </section>
                <section class="my-[10px] flex flex-row wrap">
                    <label for="bcc" class="mr-[30px]">BCC</label>
                    <input type="email" id="bcc" name="bcc" class="flex-grow px-[20px] appearance-none outline-none border-b"/>
                </section>
                <section class="my-[10px] flex flex-row wrap">
                    <label for="subject" class="mr-[30px]">Subject</label>
                    <input type="text" id="subject" name="subject" class="flex-grow px-[20px] appearance-none outline-none border-b"/>
                </section>
                <section class="my-[30px] flex flex-row wrap">
                    <textarea placeholder="Your email..." name="message" class="w-full h-[250px] appearance-none outline-none"></textarea>
                </section>
                <button type="submit" class="w-fit my-[10px] self-end hover:font-semibold">Send</button>
            </form>
        </main>
    </body>
</html>