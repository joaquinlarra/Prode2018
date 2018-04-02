			<tr class="stats-mobile">
				<td colspan="<?= $colspan?>">	
				<div>
				<small><?= lang("no confirmado")?></small>
				</div>
				</td>
			</tr>
			<tr  class="matchrow">
				<td class="input-match">
					<input disabled='disabled' type="text" maxlength="1"  class="form-control input-goals" >				
				</td>
				<td class="teamname team1">
					<small><img src="<?= base_url()?>assets_fe/img/bandera.png" class="img-rounded team1-flag" style="width:28px"><br>EQ1</small>
				</td>
				<td class="middle-col">-</td>
				<td class="teamname team2 ">
					<small><img src="<?= base_url()?>assets_fe/img/bandera.png" class="img-rounded team1-flag" style="width:28px"><br>EQ2</small>
				</td>
				<td class="input-match ">
					<input disabled='disabled' type="text" maxlength="1"  class="form-control input-goals" >
				</td>
			</tr>
			<tr class="stats-info" style="background:none">
                <td colspan="2" class="bet-col" title="<?= lang("Gana")?>">-</td>
                <td class="bet-col" title="<?= lang("Empate")?>">-</td>
                <td colspan="2" class="bet-col" style="border-right:0px" title="<?= lang("Gana")?>">-</td>
			</tr>
			<tr class="finals-separator"><td colspan="5"></td></tr>