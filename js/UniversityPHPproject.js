document.addEventListener("DOMContentLoaded", function() {
    //Get elements buttons
    const buttons = document.querySelectorAll('.aHeader');

    //Add click event
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const content = button.nextElementSibling;

            //Display toggle 
            if (content.style.display === 'block') {
                //Hide
                content.style.display = 'none';
            } else {
                //Hide other
                document.querySelectorAll('.aContent').forEach(item => {
                    item.style.display = 'none';
                });

                //Show
                content.style.display = 'block';
            }
        });
    });
});
