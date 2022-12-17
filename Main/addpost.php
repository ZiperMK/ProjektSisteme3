<?php
session_start();
?>
<html>
    <head>
        <title>Add a Spot!</title>
    </head>
    <body>
        <h1>Add a Spot!</h1>
        <form action="../DB/insertpost.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <label>Title</label>
                <input required minlength="1" maxlength="100" title="100 characters max" type="text" name="title" placeholder="Title"><br>
                <label>Description</label>
                <textarea required minlength="1" maxlength="200" title="200 characters max" rows="5" id="textArea" name="desc" placeholder="Description"></textarea><br>
                <label>Photo</label>
                <input accept="image/jpg, image/png,image/gif,image/jpeg" type="file" name="pic" value="Upload Picture"><br>
                <label for="region">Choose a region:</label>
                <select reguired name="region" id="region">
                        <option value="Gorenjska">Gorenjska</option>
                        <option value="Goriška">Goriška</option>
                        <option value="Jugovzhodna Slovenija">Jugovzhodna Slovenija</option>
                        <option value="Koroška">Koroška</option>
                        <option value="Obalno-Kraška">Obalno-Kraška</option>
                        <option value="Osrednjeslovenska">Osrednjeslovenska</option>
                        <option value="Podravska">Podravska</option>
                        <option value="Pomurska">Pomurska</option>
                        <option value="Posavska">Posavska</option>
                        <option value="Primorsko-Notranjska">Primorsko-Notranjska</option>
                        <option value="Savinjska">Savinjska</option>
                        <option value="Zasavska">Zasavska</option>
                    </optgroup>
                </select>
                <label>City/Place</label>
                <input required minlength="1" maxlength="50" title="1-50 characters" type="text" name="city" placeholder="City/Place"><br>
                <label>Address</label>
                <input required minlength="1" maxlength="100" title="Add Address" type="text" name="add" placeholder="Address"><br>
                        
            </fieldset>
        <input type="submit" value="Publish the Spot!">    
        </form>
    </body>
</html>