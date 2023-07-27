<?php
/*
Plugin Name: Comparateur
Plugin URI: https://agencesw.com
Description: Un plugin pour afficher un questionnaire et afficher un résultat en fonction des réponses.
Version: 1.0
Author: Nicastro Arnaud
Author URI: https://www.linkedin.com/in/arnaud-nicastro/
License: GPL2
*/


function afficher_questionnaire_form()
{
?>
    <div id="question1" class="question">
        <h3>Question 1 :</h3>
        <label>
            Réponse 1 : <input type="radio" name="question1" value="reponse1">
        </label>
        <label>
            Réponse 2 : <input type="radio" name="question1" value="reponse2">
        </label>
    </div>
    <!-- Ajoutez ici les div pour les questions 2 et 3 de la même manière -->

    <div id="submitBtn" style="display: none;">
        <input type="submit" name="submit_questionnaire" value="Soumettre">
    </div>

    <script>
        // Fonction pour afficher la question suivante
        function afficherQuestionSuivante(currentQuestionId, nextQuestionId) {
            $("#" + currentQuestionId).hide();
            $("#" + nextQuestionId).fadeIn();
        }

        $(document).ready(function() {
            // Afficher la première question
            $("#question1").fadeIn();
            // Cacher le bouton "Soumettre" initialement
            $("#submitBtn").hide();

            // Associer les événements de clic pour afficher les questions suivantes
            $("#question1 input[type='radio']").click(function() {
                afficherQuestionSuivante("question1", "question2");
            });
            // Associer les événements de clic pour les questions 2 et 3 de la même manière

            // Afficher le bouton "Soumettre" une fois que toutes les questions ont été répondues
            // Vous pouvez ajouter d'autres conditions ici si nécessaire
            $("#question3 input[type='radio']").click(function() {
                $("#question3").hide();
                $("#submitBtn").fadeIn();
            });
        });
    </script>
<?php
}


function afficher_resultat()
{
    if (isset($_POST['submit_questionnaire'])) {
        // Récupérer les réponses des questions
        $reponse_question1 = isset($_POST['question1']) ? sanitize_text_field($_POST['question1']) : '';
        // Récupérez ici les réponses des questions 2 et 3 de la même manière

        // Traitez les réponses et affichez le résultat
        if ($reponse_question1 == 'reponse1' /* Ajoutez ici la logique pour les autres questions */) {
            echo '<h3>Résultat :</h3>';
            echo '<p>Votre résultat en fonction des réponses.</p>';
        } else {
            // Traitez ici les autres scénarios de résultats en fonction des réponses
        }
    } else {
        afficher_questionnaire_form();
    }
}

// Appel de la fonction pour afficher le résultat
add_shortcode('questionnaire_plugin', 'afficher_resultat');
