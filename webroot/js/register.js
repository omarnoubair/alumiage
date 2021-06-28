/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    
myDomainJquery(document).ready(function(){
          myDomainJquery.validator.addMethod("usernameRegex", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9]+$/i.test(value);
    }, "Username must contain only letters, numbers, or dashes.");

                // Validation
                myDomainJquery("#register").validate({
                    rules: {
                        first_name: "required",
                        last_name: "required",
                        username: {
                            required: true,
                            usernameRegex :true,
                            minlength:3,
                            remote: {
                                type: 'post',
                                url: checkUsernameAction
                            }
                        },
                        email: {
                            required: true,
                            email: true,
                            remote: {
                                type: 'post',
                                url: checkEmailAction
                            }
                        },
                        password: {required: true, minlength: 6},
                        cpassword: {required: true, equalTo: "#password"}
                   
                    },
                    messages: {
                        first_name: "ce champ est obligatoire",
                        last_name: "ce champ est obligatoire",
                        username: {
                            required: "ce champ est obligatoire",
                            remote: "Ce nom d'utilisateur existe déja",
                            minlength: "Votre pseudo doit comporter au moins 3 caractères.",
                            usernameRegex:"Votre pseudo ne peut contenir que des caractères et des nombres"
                },
                        
                        email: {
                            required: "ce champ est obligatoire",
                            email: "Le format de votre adresse email n'est pas valide",
                            remote: "Cette adresse email est déjà utilisée"
                        },
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
                 } );
         