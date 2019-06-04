function passwordHash(form, oldpw, newpw) {
   // Crea un elemento di input che verrà usato come campo di output per la password criptata.
   var p = document.createElement("input");
   // Aggiungi un nuovo elemento al tuo form.
   if( $(oldpw).val() !== ""){
          form.appendChild(p);
   }
   p.name = "oldPw";
   p.type = "hidden"
   p.value = hex_sha512(oldpw.value);

   var q = document.createElement("input");
   // Aggiungi un nuovo elemento al tuo form.
   if( $(newpw).val() !== ""){
             form.appendChild(q);
   }

   q.name = "newPw";
   q.type = "hidden"
   q.value = hex_sha512(newpw.value);
   // Assicurati che la password non venga inviata in chiaro.
   $(oldpw).prop('disabled', true);
   $(newpw).prop('disabled', true);
   // Come ultimo passaggio, esegui il 'submit' del form.
}
