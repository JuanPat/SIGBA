<?php

/*
 * This file is part of the PHP-LCS package.
 *
 * Copyright © 2014 Erin Millard
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

//namespace Eloquent\Lcs;

/**
 * The interface implemented by longest common subsequence solvers.
 */
interface LcsSolverInterface
{
    /**
     * Returns the longest common subsequence of the given sequences.
     *
     * @link http://en.wikipedia.org/wiki/Longest_common_subsequence_problem
     *
     * @param array<integer,mixed> $sequenceA      La  primera secuencia.
     * @param array<integer,mixed> $sequenceB      The second sequence.
     * 
     *
     * @return array<integer,mixed>    La secuencia  en comun mas larga.
     */
    public function longestCommonSubsequence(
        array $sequenceA,
        array $sequenceB
    );
}
