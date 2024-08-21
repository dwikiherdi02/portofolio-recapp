<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function find(array $select = [], array $where = [], array $order = []): null|object
    {
        $q = User::query();

        if (!empty($select)) {
            $q->select($select);
        }

        if (!empty($where)) {
            foreach ($where as $col => $val) {
                $q->where($col, $val);
            }
        }


        if (!empty($order)) {
            foreach ($order as $col => $dir) {
                $q->orderBy($col, $dir);
            }
        } else {
            $q->orderBy('id', 'desc');
        }

        $q->limit(1);

        return $q->get()->first();
    }

    public function findByID(string $id): null|object
    {
        return $this->find(where: ['id' => $id]);
    }

    public function storing(array $data = []): null|object
    {
        DB::beginTransaction();
        $m = new User();
        try {
            $m->fill($data);
            $m->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return null;
        }
        return $m;

    }
}
