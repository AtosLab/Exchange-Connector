<div class="row header">
	<div class="cell">
		DateTime
	</div>
	<div class="cell">
		Pair
	</div>
	<div class="cell">
		Price
	</div>
	<div class="cell">
		Max-Min
	</div>
	<div class="cell">
		Exchange
	</div>
</div>

<?php
	foreach ($data as $item) {
		?>
		<div class="row">
			<div class="cell" data-title="Date">
				<?php echo $item['date']; ?>
			</div>
			<div class="cell" data-title="Pair">
				<?php
					echo $item['base_currency']."/".$type;
				?>
			</div>
			<div class="cell" data-title="Price">
				<?php 
					if ($type == 'JPY')
						echo $item['open_price']*113.89;
					else
						echo $item['open_price'];
				?>
			</div>
			<div class="cell" data-title="Price">
				<?php 
					if ($type == 'JPY')
						echo $item['max_min']*113.89;
					else
						echo $item['max_min']; 
				?>
			</div>
			<div class="cell" data-title="exchange">
				<?php echo $item['exchange_type']; ?>
			</div>
		</div>
		<?php
	}
	
?>