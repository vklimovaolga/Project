document.addEventListener("DOMContentLoaded", () =>{

    const buttonDelete = document.getElementById("deleteB");
    const editButton = document.querySelectorAll("#editButton");

    if(buttonDelete){
        buttonDelete.addEventListener("click", () => {
        
            let confirmm = confirm("Quer mesmo apagar?");
    
            if(confirmm){
               
                fetch("../delete_post/"+buttonDelete.value, {
                    method: "DELETE", 
                    mode: "same-origin", 
                    cache: "no-cache",
                    credentials: "same-origin", 
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    redirect: "follow", 
                    referrer: "no-referrer", 
                    body: "",
                })
                .then(response => response.json()).then(
                    redirect => {
                        window.location.replace("http://localhost/PF/Project/");
                    }
                ) 
            }
        });

    }

    for(let i = 0; i< editButton.length; i++) {
        
        editButton[i].addEventListener("click", () => {
            let oldComment = editButton[i].parentNode.previousElementSibling.lastElementChild;
            let commentID = editButton[i].parentNode.previousElementSibling.dataset.comment_id;
            let textarea = editButton[i].previousElementSibling;

            textarea.style.display = "block";
            oldComment.style.display = "none";

            textarea.textContent = oldComment.textContent;

            editButton[i].disabled = true;
            
            textarea.addEventListener("change", () => {
                
                let finalComment = textarea.value;
                
                fetch("../edit_comment/"+commentID+"/"+finalComment, {
                    method: "POST", 
                    mode: "same-origin", 
                    cache: "no-cache",
                    credentials: "same-origin", 
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    redirect: "follow", 
                    referrer: "no-referrer", 
                    body: "comment_id="+commentID+"&message="+finalComment+"",
                })
                .then(response => response.text() )
                
                textarea.style.display = "none";
                oldComment.style.display = "block";

                oldComment.textContent = finalComment;
                
                editButton[i].disabled = false;

            });
        });
    }
     

    const deleteComment = document.querySelectorAll("#deleteComment");
    

    for(let i = 0; i < deleteComment.length; i++){
        
        deleteComment[i].addEventListener("click", () => {
            
            let deleteCommentField = deleteComment[i].parentNode.previousElementSibling.dataset.comment_id;
            let confirmm = confirm("Quer mesmo apagar?");
            
            if(confirmm){
                
                fetch("../delete_comment/"+deleteCommentField, {
                    method: "DELETE", 
                    mode: "same-origin", 
                    cache: "no-cache",
                    credentials: "same-origin", 
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    redirect: "follow", 
                    referrer: "no-referrer", 
                    body: "",
                })
                .then(response => response.text())

                deleteComment[i].parentNode.previousElementSibling.style.display = "none";
                deleteComment[i].parentNode.style.display = "none";
            }
        });
    }




});