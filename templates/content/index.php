<div class="nct-table">
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Size</th>
				<th>Done</th>
				<th>Status</th>
				<th>Ratio</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($_['torrents'] as $torrent) { ?>
			<tr>
				<td><?php p($torrent->name); ?></td>
				<td><?php p($torrent->size); ?></td>
				<td><?php p($torrent->done); ?></td>
				<td><?php p($torrent->status); ?></td>
				<td><?php p($torrent->ratio); ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
