<?php

namespace App\Http\Controllers;
use App\Models\ArmorSet;

use Illuminate\Http\Request;

class ArmorSetsController extends Controller
{
    public function ArmorSets_Init(){
        ArmorSet::create([
            'price'=> 0,
            'name'=>'Deprived',
            'description' => 'Naked and of unknown origin. Either an unimaginable fool in life, or was stripped of possessions upon burial.',
            'url' => "/assets/images/ArmorSets/Deprived.jpg",
        ]);
        ArmorSet::create([
            'price'=> 10,
            'name'=>'Knight set',
            'description' => 'Armor of an obscure knight of poor renown who collapsed roaming the land.',
            'url' => "/assets/images/ArmorSets/Knight.jpg",
        ]);
        ArmorSet::create([
            'price'=> 10,
            'name'=>'Mercenary set',
            'description' => 'Armor of a mercenary and veteran of the battlefield.',
            'url' => "/assets/images/ArmorSets/Mercenary.jpg",
        ]);
        ArmorSet::create([
            'price'=> 10,
            'name'=>'Warrior set',
            'description' => 'Armor of a descendant of northern warriors famed for their brawn.',
            'url' => "/assets/images/ArmorSets/Warrior.jpg",
        ]);
        ArmorSet::create([
            'price'=> 10,
            'name'=>'Cleric set',
            'description' => 'Armor of a traveling cleric who collapsed from exhaustion.',
            'url' => "/assets/images/ArmorSets/Cleric.jpg",
        ]);
        ArmorSet::create([
            'price'=> 10,
            'name'=>'Herald set',
            'description' => 'Armor of a former herald who journeyed to finish a quest undertaken.',
            'url' => "/assets/images/ArmorSets/Herald.jpg",
        ]);
        ArmorSet::create([
            'price'=> 10,
            'name'=>'Thief set',
            'description' => 'Armor of a common thief and pitiful deserter.',
            'url' => "/assets/images/ArmorSets/Thief.jpg",
        ]);
        ArmorSet::create([
            'price'=> 10,
            'name'=>'Assassin set',
            'description' => 'Armor of an assassin who stalks their prey from the shadows.',
            'url' => "/assets/images/ArmorSets/Assassin.jpg",
        ]);
        ArmorSet::create([
            'price'=> 10,
            'name'=>'Sorcerer set',
            'description' => 'Armor of a loner who left formal academia to pursue further research.',
            'url' => "/assets/images/ArmorSets/Sorcerer.jpg",
        ]);
        ArmorSet::create([
            'price'=> 10,
            'name'=>'Pyromancer set',
            'description' => 'Armor of a pyromancer from a remote region who manipulates flame.',
            'url' => "/assets/images/ArmorSets/Pyromancer.jpg",
        ]);
    }
}
