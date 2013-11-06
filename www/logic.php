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
		//Размер матрицы рангов
		$n=0;
		$proximityMatrix = array();
		foreach($listRankMatrix as $key => $value)
		{
			$proximityMatrix[$key] = array();
		}
		//Кого сравниваем
		foreach($listRankMatrix as $keyFirst => $rankMatrixFirst)
		{
			//С кем сравниваем
			foreach ($listRankMatrix as $keySecond => $rankMatrixSecond)
			{
				if ($keyFirst <> $keySecond)
				{
					// Если мы не знаем размер матрицы рангов,то мы его узнаем
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
					//Элементы главной диагонали
					$proximityMatrix[$keyFirst][$keySecond] = 0;
				}
			}
		}
		return $proximityMatrix;
	}
	
?>