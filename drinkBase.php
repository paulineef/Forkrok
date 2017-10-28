<?php include ('sidebar.php') ?>

<body>
	
	<div class="content">
		
		<div class="placement">
			
			<table class="drink">
				
				<tbody>
				<tr>
					<th>
						<h2>Klara's Special</h2>
					</th>
				<tr/>
				<tr>
					<td>
						<h5>Ingredients</h5>
						<ul>
							<li>Vodka</li>
							<li>Lime juice</li>
							<li>Lemon juice</li>
							<li>Lemon slices</li>
							<li>Soda</li>

						</ul>

						<p>
							Lorem ipsum dolor sit amet, sapientem patrioque voluptatibus ne ius, sea cu nobis praesent. 
						</p>
					</td>
					<td class="t-left">
						<img id="drink" src="uploadedfiles/Klaras.png">
					</td>
				</tr>
			</tbody>
			</table>

			<span><i class="fa fa-chevron-left" aria-hidden="true"></i>Back</span>
		</div>
	</div>

<style type="text/css">

	#drink{
		max-width: 120px;
	}

	.drink table {
		width: 100%; 
		border-collapse: collapse;
		padding: 0;
		margin: 0;
	}

	.drink t-body {
		width: 100%;
	}

	.drink th {
		text-align: left; 
	}

	.drink td {
		vertical-align: top; 
		max-width: 100px; 
	}

	.t-left {
		padding-left: 30px; 
	}

	.drink td h5 {
		margin: 0;
		font-size: 15pt; 
	}

	.drink ul {
		padding:0;
		margin-top: 10px; 
	}

	.drink ul li {
		list-style-type: none; 
		font-family: 'lato', sans-serif; 
		font-weight: 400;
		font-size: 12pt; 
	}

	@media (min-width: 928px){
		.drink h5 {
			font-size: 14px; 
		}
		.drink ul li {
			font-size: 10pt; 
		}

		#drink {
			max-width: 100px; 
		}
	}


</style>

</body>
<?php include ('footer.php')  ?>