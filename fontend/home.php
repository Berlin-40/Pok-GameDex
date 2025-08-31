<?php
// Message dynamique à afficher
$message = "Bienvenue sur PokéGameDex, votre site de jeux Pokémon préféré ! Explorez, ajoutez et découvrez de nouveaux jeux.Ce site est créé pour les passisionnés de jeux Pokémon qui veulle avoir la description de jeux et découvrir de nouveau creer par des Fan ou non !";
$imagePath = "../uploads/ImgAcceil.jpeg"; // L'image à afficher (assurez-vous que cette image existe)
?>

<div class="home-container">
    <h1>Bienvenue sur PokéGameDex !</h1>
    <div class="message-container">
        <!-- Image -->
        <img src="<?php echo $imagePath; ?>" alt="Bienvenue" class="welcome-image">
        <!-- Message -->
        <p class="welcome-message"><?php echo $message; ?></p>
    </div>
</div>
