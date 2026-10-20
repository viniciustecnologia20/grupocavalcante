WebViewer({
    path: 'https://pdfjs.express/lib',  // Caminho para a biblioteca do PDF.js Express
    initialDoc: $pdfFile,     // URL do PDF que você deseja carregar
  }, document.getElementById('viewer')).then(instance => {
    const { documentViewer, annotationManager, Annotations, Tools, Actions } = instance;
  
    // Ativar a ferramenta de seleção de texto
    const textEditTool = instance.UI.createTool({
      toolName: 'TextEditTool',
      // Definir a ferramenta de edição de texto como ação
      action: Actions.textEdit()
    });
  
    instance.UI.setToolMode('TextEditTool');
  
    // Exemplo de como detectar seleção de texto e iniciar a edição
    documentViewer.addEventListener('documentLoaded', () => {
      console.log('PDF carregado!');
  
      // Agora você pode permitir que o usuário selecione e edite o texto
      // Aqui você pode usar a API para programaticamente iniciar edições, adicionar anotações ou manipular o texto
    });
  });
  