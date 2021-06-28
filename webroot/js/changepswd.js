/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

  
 myDomainJquery(document).ready(function()
            {
        

                // Validation
                myDomainJquery("#changepswd").validate({
                    rules: {
                       
                        password: {required: true, minlength: 6},
                        cpassword: {required: true, equalTo: "#password"}
                   
                    },
                    messages: {
                       
                        password: {
                            required: "ce champ est obligatoire",
                            minlength: "Votre mot de passe doit comporter au moins 6 caractères."},
                        cpassword: {
                            required: "Confirmer votre mot de passe",
                            equalTo: "La confirmation du mot de passe ne correspond pas"}
                   
                    },
                    errorClass: "help-block",
                    errorElement: "span",
                    highlight: function(element, errorClass, validClass)
                    {
                        myDomainJquery(element).parents('.form-group').removeClass('has-success');
                       myDomainJquery(element).parents('.form-group').addClass('has-error');
                    },
                    unhighlight: function(element, errorClass, validClass)
                    {
                        myDomainJquery(element).parents('.form-group').removeClass('has-error');
                        myDomainJquery(element).parents('.form-group').addClass('has-success');
                    }
                });
            });