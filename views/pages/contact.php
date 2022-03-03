<?php
echo "<link rel='stylesheet' href='$dir/assets/styles/contact/style.css'>
        <div class='contact'>
            <h2>Contact</h2>
            <div class='content'>
                <form action='' method='post'>
                    <label for='naam'>
                        Naam
                        <input type='naam' name='naam' id='naam' placeholder='Naam'>
                    </label>
                    <label for='email'>
                        Email
                        <input type='email' name='email' id='email' placeholder='Email@adres.com'>
                    </label>
                    <label for='subject'>
                        Onderwerp
                        <input type='text' name='subject' id='subject' placeholder='Onderwerp'>
                        </label>
                    <label for='message'>
                        Bericht
                        <textarea name='msg' id='message' placeholder='Bericht...'></textarea>
                    </label>
                    <input type='submit' value='Verstuur'>
                </form>
                <img src='$dir/assets/img/contact-img.jpg' alt='Standplaats Enter'>
            </div>
        </div>";