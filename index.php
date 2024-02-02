<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Voyage</title>
    <link rel="stylesheet" href="style.css"
</head>
<body>

    <main>

        <h1>ABC Voyage</h1>
        <form method="post" action="handelform.php">
            <label>Name <input type="text" name="name" placeholder="Name ..." required></label><br>
            <label>Email <input type="email" name="name" placeholder="Name ..." required></label>
        <br>
            <label>Destination
                 <select required name="destination">
                     <option>-- Select an Option --</option>
                    <option value="Africa">Africa</option>
                    <option value="Europa">Europa</option>
                    <option value="Asia">Asia</option>
                    <option value="North America">North America</option>
                    <option value="Latin America">Latin America</option>
                    <option value="Oceania">Oceania</option>
                 </select>
            </label>
        <br>
            <label>Seasons 

                <label><input type="radio" name="season" value="summer"> Summer</label>
                <label><input type="radio" name="season" value="winter"> Winter</label>
                <label><input type="radio" name="season" value="spring"> Spring</label>
                <label><input type="radio" name="season" value="autumn"> Autumn</label>
            </label>
        <br>
            <label>
                Interest
                <label><input type="checkbox" name="interests[]" value="Photography"> Photography</label>
                <label><input type="checkbox" name="interests[]" value="Trekking"> Trekking</label>
                <label><input type="checkbox" name="interests[]" value="Star Gazing"> Star Gazing</label>
                <label><input type="checkbox" name="interests[]" value="Bird Watching"> Bird Watching</label>

            </label>
        <br>
            <label>
            Participant(s)
                 <input type="number" name="participant" required>
            </label>
        <br>
            <label>
                Requirements
                <textarea name="message" require></textarea>
            </label>
            <input type="hidden" name="token" value="">
            <button type="submit">SEND</button>
        </form>





    </main>


















</body>
</html>