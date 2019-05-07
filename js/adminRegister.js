function registerClick(form, password) {
   // Crea un elemento di input che verrà usato come campo di output per lo user_type
   var p = document.createElement("input");
   // Aggiungi un nuovo elemento al tuo form.
   form.appendChild(p);
   p.name = "user_type";
   p.type = "hidden"
   p.value = "Admin";
   formhash(form, password);
 }
