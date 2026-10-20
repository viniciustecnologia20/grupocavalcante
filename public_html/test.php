<!DOCTYPE html>
<head>
	<metacharset = "utf-8">
</head>
<html>
<body>
<p>principal</p>
using ProjetoTesteVincius.Dados;
using ProjetoTesteVincius.Dados.Clientes;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.ComponentModel.DataAnnotations;
using System.Data;
using System.Data.Entity;
using System.Drawing;
using System.Globalization;
using System.Linq;
using System.Runtime.Remoting.Contexts;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;


namespace ProjetoTesteVincius
{
    public partial class vwCliente : Form
    {
        public vwCliente()
        {
            InitializeComponent();
            CarregarDadosNoGrid();
            CarregarNacionalidades();
        }
        public void CarregarNacionalidades()
        {
            using (var contexto = new BDContexto())
            {
                // Consulte todas as nacionalidades no contexto do banco de dados
                var nacionalidades = contexto.tblNacionalidades.ToList();

                // Limpe os itens existentes no ComboBox
                lstNacionalidade.Items.Clear();

                // Adicione cada nacionalidade como um item no ComboBox
                foreach (var nacionalidade in nacionalidades)
                {
                    lstNacionalidade.Items.Add(new ComboboxItem
                    {
                        Value = nacionalidade.ID.ToString(), // ID como valor do item
                        Text = nacionalidade.Nacionalidade // Nome da nacionalidade como texto do item
                    });
                }
            }
        }

        public void lstNacionalidade_SelectedIndexChanged(object sender, EventArgs e)
        {
            // Acesse o valor selecionado no ComboBox
            var selectedItem = (ComboboxItem)lstNacionalidade.SelectedItem;
            if (selectedItem != null)
            {
                int idNacionalidade = int.Parse(selectedItem.Value); // Converta o valor para inteiro (ID)
                // Use o ID da nacionalidade selecionada conforme necessário
            }
        }

        // Classe para representar um item do ComboBox com valor e texto
        public class ComboboxItem
        {
            public string Value { get; set; }
            public string Text { get; set; }

            public override string ToString()
            {
                return Text;
            }

        }


        // Método para carregar os dados no grid
        private void CarregarDadosNoGrid()
        {
            using (var contexto = new BDContexto())
            {
                // Carregar todos os clientes incluindo suas nacionalidades
                var clientes = contexto.tblClientes.Include(c => c.Nacionalidade).ToList();

                // Projeção dos dados para exibir o nome da nacionalidade
                var dadosExibicao = clientes.Select(c => new {
                    c.ID,
                    c.Nome,
                    c.CPF,
                    c.Telefone,
                    c.Sexo,
                    Nacionalidade = c.Nacionalidade.Nacionalidade, // Exibir o nome da nacionalidade
                    c.DataNascimento,
                    c.DataHoraCadastro
                }).ToList();

                // Vincular a lista de clientes ao DataGridView
                grClientes.DataSource = dadosExibicao;
                grClientes.Columns["ID"].Visible = false;
            }
        }

        private void cmdSalvar_Click(object sender, EventArgs e)
        {
            string nome = txtNome.Text;
            string cpf = txtCPF.Text;
            string telefone = txtTelefone.Text;
            string sexo = lstSexo.Text;
            string nacionalidade = lstNacionalidade.Text;
            DateTime dataNascimento = dsDataNascimento.Value.Date;
            DateTime dataHoraCadastro = DateTime.Now;

            using (var context = new BDContexto())
            {
                // Verificar se o cliente já existe no banco de dados com base no ID
                int clienteId = ObterIdDoClienteExistentePorCPF(context, cpf);

                if (clienteId == -1)
                {
                    // Se o cliente não existir, crie um novo cliente
                    var cliente = new tblClientes
                    {
                        Nome = nome,
                        CPF = cpf,
                        Telefone = telefone,
                        Sexo = sexo,
                        Nacionalidade_id = ObterIdNacionalidadePorNome(nacionalidade),
                        DataNascimento =  dataNascimento,
                        DataHoraCadastro = dataHoraCadastro
                    };

                    context.tblClientes.Add(cliente);
                }
                else
                {
                    // Se o cliente já existir, atualize suas informações
                    var cliente = context.tblClientes.Find(clienteId);

                    cliente.Nome = nome;
                    cliente.Telefone = telefone;
                    cliente.Sexo = sexo;
                    cliente.Nacionalidade_id = ObterIdNacionalidadePorNome(nacionalidade);
                    cliente.DataNascimento = dataNascimento;
                }

                context.SaveChanges();
                CarregarDadosNoGrid();
            }
        }

        private int ObterIdNacionalidadePorNome(string nacionalidade)
        {
            using (var contexto = new BDContexto())
            { 
                // Consulte a tabela de nacionalidades para encontrar a nacionalidade com o nome fornecido
                var nacionalidadeEncontrada = contexto.tblNacionalidades.FirstOrDefault(n => n.Nacionalidade == nacionalidade);

                // Se a nacionalidade for encontrada, retorne o ID; caso contrário, retorne -1
                return nacionalidadeEncontrada != null ? nacionalidadeEncontrada.ID : -1;

                
            }
        }

        // Método para obter o ID do cliente existente com base no CPF
        private int ObterIdDoClienteExistentePorCPF(BDContexto context, string cpf)
        {
            var cliente = context.tblClientes.FirstOrDefault(c => c.CPF == cpf);

            return cliente != null ? cliente.ID : -1;
        }

        private void cmdRemover_Click(object sender, EventArgs e)
        {

            DialogResult resultado = MessageBox.Show("Tem certeza que deseja confirmar a ação?", "Confirmação", MessageBoxButtons.YesNo, MessageBoxIcon.Question);


            if (grClientes.SelectedRows.Count > 0)
            {
                if (resultado == DialogResult.Yes)
                {
                    using (var context = new BDContexto())
                    {
                        // Obter o ID da linha selecionada
                        int idSelecionado = Convert.ToInt32(grClientes.SelectedRows[0].Cells["ID"].Value);

                        // Exibir o ID da linha selecionada em uma mensagem
                        var cliente = context.tblClientes.FirstOrDefault(c => c.ID == idSelecionado);
                        if (cliente != null)
                        {
                            // Remover o cliente do contexto
                            context.tblClientes.Remove(cliente);

                            // Salvar as alterações no banco de dados
                            context.SaveChanges();
                            CarregarDadosNoGrid();

                            // Exibir uma mensagem de confirmação
                            MessageBox.Show("Cliente removido com sucesso.", "Sucesso", MessageBoxButtons.OK, MessageBoxIcon.Information);
                        }

                        // Agora você pode usar o ID selecionado para realizar a ação desejada
                        // Por exemplo, você pode chamar um método e passar o ID como parâmetro
                    }
                }
            }
            else
            {
                MessageBox.Show("Por favor, selecione uma linha antes de confirmar a ação.", "Aviso", MessageBoxButtons.OK, MessageBoxIcon.Warning);
            }
        }

        private void cmdPesquisar_Click(object sender, EventArgs e)
        {
            string nome = txtNome.Text.Trim();
            string cpf = txtCPF.Text.Trim();

            using (var context = new BDContexto())
            {
                var query = context.tblClientes.AsQueryable();

                // Verificar se o campo 'Nome' foi preenchido
                if (!string.IsNullOrEmpty(nome))
                {
                    query = query.Where(c => c.Nome.Contains(nome));
                }

                // Verificar se o campo 'CPF' foi preenchido
                if (!string.IsNullOrEmpty(cpf))
                {
                    query = query.Where(c => c.CPF == cpf);
                }

                // Executar a consulta
                var clientes = query.ToList();
                grClientes.DataSource = clientes;
            }
        }

        private void cmdNovo_Click(object sender, EventArgs e)
        {
            txtNome.Text = "";
            txtCPF.Text = "";
            txtTelefone.Text = "";
            lstSexo.Text = "---";
            lstNacionalidade.Text = "";
            dsDataNascimento.Value = DateTime.Now;

            txtCPF.Focus();
        }

        private void txtCPF_TextChanged(object sender, EventArgs e)
        {
            string cpf = txtCPF.Text.Trim();

            using (var context = new BDContexto())
            {
                var cliente = context.tblClientes.FirstOrDefault(c => c.CPF == cpf);

                if (cliente != null)
                {
                    var nacionalidade = context.tblNacionalidades.FirstOrDefault(c => c.ID == cliente.Nacionalidade_id);

                    txtNome.Text = cliente.Nome;
                    txtTelefone.Text = cliente.Telefone;
                    lstSexo.Text = cliente.Sexo;
                    lstNacionalidade.Text = nacionalidade.Nacionalidade;
                    dsDataNascimento.Value = cliente.DataNascimento;
                }
            }
        }
    }
}
<p>BDContexto</p>
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data.Entity;
using ProjetoTesteVincius.Dados.Clientes;
using ProjetoTesteVincius.Dados.Nacionalidade;

namespace ProjetoTesteVincius.Dados
{
    internal class BDContexto : DbContext
    {
        private const string connectionStrig = @"Data Source=(localdb)\MSSQLLocalDB;Initial Catalog=testeVinicius;";

        public BDContexto() : base(connectionStrig) 
        {
            tblClientes = Set<tblClientes>();
            tblNacionalidades = Set<tblNacionalidades>();
            Database.SetInitializer<BDContexto>(null);

        }

        public DbSet <tblClientes> tblClientes { get; set; }

        public DbSet <tblNacionalidades> tblNacionalidades { get; set; }
    }
}
<p>tblClientes</p>
using ProjetoTesteVincius.Dados.Nacionalidade;
using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ProjetoTesteVincius.Dados.Clientes
{
    internal class tblClientes
    {
        [Key]
        [DatabaseGenerated(DatabaseGeneratedOption.Identity)]
        public int ID { get; set; }

        [StringLength(200)]
        [Required]
        public string Nome { get; set; }

        [StringLength(20)]
        [Required]
        public string CPF { get; set; }

        [StringLength(20)]
        [Required]
        public string Telefone { get; set; }

        [StringLength(1)]
        [Required]
        public string Sexo { get; set; }

        [ForeignKey("Nacionalidade")]
        public int Nacionalidade_id { get; set; }

        // Propriedade de navegação para acessar os dados da nacionalidade
        public tblNacionalidades Nacionalidade { get; set; }

        [Required]
        [Column(TypeName = "date")]
        public DateTime DataNascimento { get; set; } // Corrigido para ClienteDataType

        [Required]
        public DateTime DataHoraCadastro { get; set; }
    }
}
<p>tblNacionalidade</p>
using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations.Schema;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;


namespace ProjetoTesteVincius.Dados.Nacionalidade
{
    internal class tblNacionalidades
    {
        [Key]
        [DatabaseGenerated(DatabaseGeneratedOption.Identity)]
        public int ID { get; set; }

        [StringLength(100)]
        [Required]
        public string Nacionalidade { get; set; }
    }
}







<?php
//
//
//$url = 'https://api.tiny.com.br/api2/produto.obter.php';
//$token = '145839c2fd92a909f9e6839a39921cafd5d94950';
//$id = '717810282';
//$formato = 'JSON';
//$data = "token=$token&id=$id&formato=$formato";
//
//$url = 'https://api.tiny.com.br/api2/produtos.pesquisa.php';
//$token = '145839c2fd92a909f9e6839a39921cafd5d94950';
//$pesquisa = 'Modulo Amplificador Taramps 3000';
//$data = "token=$token&pesquisa=$pesquisa&formato=JSON";
//
//$retorno = enviarREST($url, $data);
//$content = json_decode($retorno);
//foreach ($content->retorno->produtos as $produto){
//	print $produto->produto->preco;
//}
////var_dump($produto);
//echo "<pre>";
////print_r($produto->produto->preco);
//echo "</pre>";      
//
//function enviarREST($url, $data, $optional_headers = null) {
//	$params = array('http' => array(
//		'method' => 'POST',
//	    'content' => $data
//	));
//	
//	if ($optional_headers !== null) {
//		$params['http']['header'] = $optional_headers;
//	}
//	
//	$ctx = stream_context_create($params);
//	$fp = @fopen($url, 'rb', false, $ctx);
//	if (!$fp) {
//		throw new Exception("Problema com $url, $php_errormsg");
//	}
//	$response = @stream_get_contents($fp);
//	if ($response === false) {
//		throw new Exception("Problema obtendo retorno de $url, $php_errormsg");
//	}
//	
//	return $response;
//}
?>