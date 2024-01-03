<?php

namespace App\Filter\v1;

use Illuminate\Http\Request;

class UserFilter{
    protected $safeParms = [
        'username' => ['eq'],
        'email'=> ['eq'],
        'idRole'=>['eq', 'gt', 'lt'],
    ];

    protected $columnMap = [
        'idRole' => 'id_role',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>='
    ];

    public function transform(Request $request){
        $filterQuery = [];

        foreach($this->safeParms as $parm => $operators){
            $query = $request->query($parm);

            if(!isset($query)){
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;
            foreach($operators as $operator){
                if(isset($query[$operator])){
                    $filterQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $filterQuery;
    }
}
