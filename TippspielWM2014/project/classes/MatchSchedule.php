<?php
include_once('Db.php');

class MatchSchedule {
	private $db;
	private $weekdays;

	public function __construct() {
		$this->db = new Db();
		$this->weekdays = array('So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa');
	}

	/**
	 * Shows the entire table with all matches including the textfields for the bets
	 */
	public function showMatchesByGroup() {
		$phaseTmp = '';
		$groupTmp = '';
		
		$sqlQuery = 'SELECT * FROM qryAllMatches ORDER BY ph_id, groupName, fbm_id';
		
		$result = $this->db->query($sqlQuery);
		
		while($row = $result->fetch_object()) {
			// checks if 'Gruppenphase', only in this phase there are several groups
			if ($row->phaseName == "Gruppenphase") {
				$phaseTmp = $row->phaseName;
				
				// checks if the current match belongs to a new group
				// if so, a headline is printed
				if ($row->groupName != $groupTmp) {
					
					// if its not the first group, the previous table has to be finished
					if (!empty($groupTmp)) {
						echo "	</tbody>";
						echo "</table>";
					}
					
					// print the headline (group name) and table header
					echo "<h2>Gruppe $row->groupName</h2>";
					$this->showTableHeader();
					$groupTmp = $row->groupName;
				}
			
			// for the other phases the phase name instead of group name is printed
			} else {
								
				if ($row->phaseName != $phaseTmp) {
					echo "	</tbody>";
					echo "</table>";
					
					// print the headline (phase name) and table header
					echo "<h2>$row->phaseName</h2>";
					$this->showTableHeader();
					$phaseTmp = $row->phaseName;
				}
			}				
			
			// for each match print the necessary information
			echo "<tr>";
			echo "	<td>$row->fbm_id</td>";
			echo "	<td>". $this->getWeekday($row->matchDay) .", ". $this->formatDate($row->matchDay) ."&nbsp;$row->matchTimeLocal</td>";
			echo "	<td>$row->city</td>";
			echo "	<td>". $this->getTeamFlag($row->teamHomeCC) ." $row->teamNameHome</td>";
			echo "	<td>$row->scoreTeamHome : $row->scoreTeamGuest</td>";
			echo "	<td>". $this->getTeamFlag($row->teamGuestCC) ." $row->teamNameGuest</td>";
			echo "	<td></td>";
			echo "	<td></td>";
			echo "</tr>";
		}
		$this->showTableFooter();
	}
	
	/**
	 * Shows the table header
	 */
	private function showTableHeader() {
		echo "<table>";
		echo "	<colgroup>";
		echo "		<col width='5%'>";
		echo "		<col width='13%'>";
		echo "		<col width='15%'>";
		echo "		<col width='23%'>";
		echo "		<col width='10%'>";
		echo "		<col width='23%'>";
		echo "		<col width='10%'>";
		echo "		<col width='*'>";
		echo "	</colgroup>";
		echo "	<thead>";
		echo "		<tr>";
		echo "			<th>#</th>";
		echo "			<th>Datum/Zeit</th>";
		echo "			<th>Ort</th>";
		echo "			<th colspan='3'>Resultat</th>";
		echo "			<th>Tipp</th>";
		echo "			<th>Pkt</th>";
		echo "		</tr>";
		echo "	</thead>";
		echo "	<tbody>";
	}
	
	/**
	 * Shows the table footer
	 */
	private function showTableFooter() {
		echo "	</tbody>";
		echo "</table>";
	}
	
	/**
	 * Returns the image tag for the corresponding team flag
	 */
	private function getTeamFlag($countryCode) {
		if (!empty($countryCode)) {
			return "<img src='http://img.fifa.com/imgml/flags/s/{$countryCode}.gif' title='{$countryCode}' />";
		}
	}
	
	/**
	 * Returns the day of the week due to the match day
	 */
	private function getWeekday($matchDay) {
		return $this->weekdays[date('w', strtotime($matchDay))];
	}
	
	/**
	 * Returns the match day as a formated date
	 */
	private function formatDate($matchDay) {
		return date("d.m.", strtotime($matchDay));
	}
}
?>