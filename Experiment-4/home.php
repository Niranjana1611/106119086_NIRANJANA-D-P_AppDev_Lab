<!DOCTYPE html>
<style>
	body
	{    
	    font-family: sans-serif;   
	    background: lightgreen;
	    background-attachment: fixed;
	}
	input[type="submit"]
	{    
	    text-align: center;
	    font-family: sans-serif;  
	    font-size: 15px; 
	    width: 150px;    
	    height: 30px;    
	    position: relative;    
	}   
	input[type="submit"] 
    {    
        text-align: center;
        font-family: sans-serif;  
        font-size: 15px; 
        width: 90px;    
        height: 30px;    
        position: relative;
        left: 100px;    
    }     
	div
	{
	    text-align: left;
	    border: 5px outset black;
	    background-color: White;
	    width: 50%;
	    padding: 10px;
	    margin: auto;
	    border-radius: 5px;
	}
	table
    {    
        border-radius: 5px;
        border-spacing: 0 15px;
        text-align: center;    
        background: white;
        font-family: sans-serif;    
        font-size: 20;    
        border: 3px solid black;    
        width: 600px;    
        margin: 20px auto;    
    }
</style>
<script type="text/javascript">
		
	var ajax = new XMLHttpRequest();
	var method = "get";
	var url = "viewallbooks.php";
	var asynchronous = true;

	ajax.open(method, url, asynchronous);
	ajax.send();

	ajax.onreadystatechange = function() 
	{
		if (this.readyState == 4 && this.status == 200) 
		{
			var data = JSON.parse(this.responseText);
	        console.log(data);
			var html = "";
			for(var a=0; a<data.length; a++)
			{
				var book_id = data[a].book_id;
				var title = data[a].title;
				var author = data[a].author;
				var price = data[a].price;
				console.log(book_id);
				html += "<tr>";
				    html += "<td>" + book_id + "</td>";
				    html += "<td>" + title + "</td>";
				    html += "<td>" + author + "</td>";
				    html += "<td>" + price + "</td>";
				html += "</tr>";
				document.getElementById("data").innerHTML = html;
			}
		}
	};
</script>
<center><h1>ABC BOOKS</h1></center><br>
<center><h3>BOOKS CATALOGUE</h3></center>
<table>
	<tr>
		<th>Book ID</th>
		<th>Book Title</th>
		<th>Book Author</th>
		<th>Book Price</th>
	</tr>
	<tbody id="data"></tbody>
</table>
<center><a href="index.php"><input type="submit" name="logout" value="logout"></a></center>