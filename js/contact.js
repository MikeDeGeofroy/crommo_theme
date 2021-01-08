function ObjectAnimation(template_directory){
    
    container = document.getElementById( 'canvas' );
    document.body.appendChild( container );

    var scene = new THREE.Scene();

    var camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );
    camera.position.z = 2;

    var renderer = new THREE.WebGLRenderer({antialias: true});

    renderer.setClearColor("#FFFFFF");

    renderer.setSize(window.innerWidth, window.innerHeight);

    document.body.appendChild(renderer.domElement);

    var light1 = new THREE.PointLight(0xFFFFFF, 1, 500);
    light1.position.set(0, 0, 20);
    scene.add(light1);
    var light2 = new THREE.PointLight(0xFFFFFF, 1, 500);
    light2.position.set(0, 20, 0);
    scene.add(light2);
    var light3 = new THREE.PointLight(0xFFFFFF, 1, 500);
    light2.position.set(20, 0, 0);
    scene.add(light3);

    var objLoader = new THREE.OBJLoader();
    var mtlLoader = new THREE.MTLLoader();

    var MyObj;

    mtlLoader.setPath(template_directory + '/3d_objects/');

    console.log(template_directory);

    var url = "untitled.mtl";

    mtlLoader.load(url, function(materials) {

    materials.preload();

    var objLoader = new THREE.OBJLoader();
    objLoader.setMaterials(materials);
    objLoader.setPath(template_directory + '/3d_objects/');
    objLoader.load('untitled.obj', function (object) {

        MyObj = object;

        scene.add(object);

    });

    });

    var render = function() {

        requestAnimationFrame(render);  

        MyObj.position.z = -50;
        MyObj.position.x = 50;
        MyObj.rotation.y -= 0.005;
        // MyObj.rotation.z += 0.005;
        // MyObj.rotation.x += 0.001;

        renderer.render(scene, camera);
    } 

    window.addEventListener( 'resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize( window.innerWidth, window.innerHeight );
    }, false );

    render();
}
