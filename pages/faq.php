<?php include('../data/globalsession.php');?>
<!DOCTYPE html>
<html>

<head>
    <style>
    .accordion{
        cursor: pointer;
        background:#C7F7F6;
    }
        .active, .accordion:hover{
            
        }
        
    .answer{
        display:none;
    }
        
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<?php include('../pagelayout/css.php');?>
</head>

<body>
<?php include('../pagelayout/navagationbar.php');?>
    <main class="page faq-page">
        <section class="clean-block clean-faq dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Frequently Asked Questions (FAQ)</h2>
                   <i> <p>You ask the QUESTIONS we give the ANSWERS.</p></i>
                </div>
                <div class="block-content">
                       <button class="accordion" <h5>How do I subscribe to a course?</h5></button>
                        <div class="answer" >
                            <p>A user may subscribe by clicking the subscribe button on the courses page.</p>
                        </div>
                    </div>
                    <div class="block-content">
                     <button class="accordion" <h5>How can I get addtional information about each course?</h5></button>
                        <div class="answer" >
                            <p>The user may get additional information by clicking on the course icon and it will redicrect you to the course's information page.</p>
                        </div>
                    </div>
                     <div class="block-content">
                     <button class="accordion" <h5>Can I use a debit or credit card to pay for my courses?</h5></button>
                        <div class="answer" >
                            <p>Yes, you can pay with either a debit or credit card.</p>
                        </div>
                    </div>
    </main>
                   
       <?php include('../pagelayout/footer.php');?>
                       <script>
                        var coll = document.getElementsByClassName("accordion");
                        var c;
                        
                        for (c = 0; c < coll.length; c++) {
                          coll[c].addEventListener("click", function() {
                            this.classList.toggle("active");
                            var answer = this.nextElementSibling;
                            if (answer.style.display === "block") {
                              answer.style.display = "none";
                            } else {
                              answer.style.display = "block";
                            }
                          });
                        }
                          </script>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
</html>