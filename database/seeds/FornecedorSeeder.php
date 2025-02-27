<?php 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instaciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 10';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        //o método create (atenção para o atributo fillable da classe)
        Fornecedor::create([
            'nome' => 'Fornecedor 11',
            'site' => 'fornecedor110.com.br',
            'uf' => 'RS',
            'email' => 'contato@fornecedor110.com.br'
        ]);

        //insert
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 12',
            'site' => 'fornecedor120.com.br',
            'uf' => 'SP',
            'email' => 'contato@fornecedor120.com.br'
        ]);
    }
}
