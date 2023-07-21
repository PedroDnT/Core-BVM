<?php declare(strict_types = 1);

/*  Copyright (c) 2023 Nikita Zhavoronkov, nikzh@nikzh.com
 *  Copyright (c) 2023 3xpl developers, 3@3xpl.com
 *  Distributed under the MIT software license, see the accompanying file LICENSE.md  */

/*  This is the main Cardano module which processes UTXO transfers only. See CardanoMultiAssetLikeMainModule for details.  */

final class CardanoMultiAssetMainModule extends CardanoMultiAssetLikeMainModule implements Module
{
    function initialize()
    {
        // CoreModule
        $this->blockchain = 'cardano';
        $this->module = 'cardano-multi-asset-main';
        $this->is_main = true;
        $this->first_block_id = 1;
        $this->first_block_date = '2017-09-23';
    }
}
