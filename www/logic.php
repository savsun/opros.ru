<?php
	function getRankMatrix($marks)
	{
		$listRankMatr = array();
		foreach($marks as $key => $mark)
		{
			//Матрица рангов для оценок конкретного эксперта
			$rankMatr=array();
			for ($i=0; $i<(count($mark)); $i++)
				{
					$rankRow=array();
					for ($j=0; $j<(count($mark)); $j++)
					{
						array_push($rankRow,0);
					}
					array_push($rankMatr,$rankRow);
				} 
			
			for ($i=0; $i<(count($mark)); $i++)
			{
				for ($j=$i+1; $j<(count($mark)); $j++)
				{
					if ($mark[$i]==$mark[$j])
					{
						$rankMatr[$i][$j]=0;
						$rankMatr[$j][$i]=0;
					}
					else if ($mark[$i]>$mark[$j])
						{
							$rankMatr[$i][$j]=1;
							$rankMatr[$j][$i]=-1;
						}
						else
						{
							$rankMatr[$i][$j]=-1;
							$rankMatr[$j][$i]=1;
						}
				}
			}
			$listRankMatr[$key] = $rankMatr;
		}
		return $listRankMatr;
	}
	
	function getProximityMatrix($listRankMatrix)
	{
		$proximityMatrix = array();
		foreach($listRankMatrix as $key => $value)
		{
			$proximityMatrix[$key] = array();
		}
		foreach($listRankMatrix as $keyFirst => $rankMatrixFirst)
		{
			foreach ($listRankMatrix as $keySecond => $rankMatrixSecond)
			{
				if ($keyFirst <> $keySecond)
				{
					if ($n == 0)
					{
						$n = count($rankMatrixFirst);
					}
					
					if ($proximityMatrix[$keyFirst][$keySecond] == NULL)
					{
					$proximity = 0;
					for ($i = 0; $i < $n; $i++)
					{
						for ($j = 0; $j < $n; $j++)
						{
							$proximity += abs($rankMatrixFirst[$i][$j] - $rankMatrixSecond[$i][$j]);
						}
					}
					$proximityMatrix[$keyFirst][$keySecond] = $proximity;
					$proximityMatrix[$keySecond][$keyFirst] = $proximity;
					}
				}
				else
				{
					$proximityMatrix[$keyFirst][$keySecond] = 0;
				}
			}
		}
		return $proximityMatrix;
	}
	
?>