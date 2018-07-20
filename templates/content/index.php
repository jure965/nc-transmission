<div class="nct-table">
	<table>
		<thead>
			<tr>
				<th><!--<a href="torrents/asc/name">-->Name</a></th>
				<th>Size</th>
				<th>Done</th>
				<th>Status</th>
				<th>Ratio</th>
				<th><!--<a href="torrents/dsc/addedDate">-->Added on</a></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($_['torrents'] as $torrent) { ?>
			<tr>
				<td><?php p($torrent->getName()); ?></td>
				<td><?php p($torrent->getSizeWhenDone()); ?></td>
				<td><?php p($torrent->getPercentDone()); ?></td>
				<td><?php p($torrent->getStatus()); ?></td>
				<td><?php p($torrent->getUploadRatio()); ?></td>
				<td><?php p($torrent->getAddedDate()); ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
