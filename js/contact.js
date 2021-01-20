function ObjectAnimation(template_directory){
    
    container = document.getElementById( 'canvas' );
    // document.body.appendChild( container );

    var scene = new THREE.Scene();

    var w = container.offsetWidth;
    var h = container.offsetHeight;

    var camera = new THREE.PerspectiveCamera( 75, w/h, 0.1, 1000 );
    camera.position.z = 2;

    var renderer = new THREE.WebGLRenderer({antialias: true});

    renderer.setClearColor("#FFFFFF");

    renderer.setSize(w, h);

    container.appendChild(renderer.domElement);

    var light1 = new THREE.PointLight(0xFFFFFF, 1, 500);
    light1.position.set(0, 0, 20);
    scene.add(light1);
    var light2 = new THREE.PointLight(0xFFFFFF, 1, 500);
    light2.position.set(0, 20, 0);
    scene.add(light2);
    var light3 = new THREE.PointLight(0xFFFFFF, 1, 500);
    light2.position.set(-20, 0, 0);
    // scene.add(light3);

    var objLoader = new THREE.OBJLoader();
    var mtlLoader = new THREE.MTLLoader();

    var MyObj;

    mtlLoader.setPath(template_directory + '/3d_objects/');

    console.log(template_directory);

    var url = "apollo.mtl";

    mtlLoader.load(url, function(materials) {

    materials.preload();

    var objLoader = new THREE.OBJLoader();
    objLoader.setMaterials(materials);
    objLoader.setPath(template_directory + '/3d_objects/');
    objLoader.load('apollo.obj', function (object) {

        MyObj = object;

        scene.add(object);

    });

    });

    var render = function() {

        requestAnimationFrame(render);  

        MyObj.scale.z = 0.005;
        MyObj.scale.x = 0.005;
        MyObj.scale.y = 0.005;
        MyObj.position.z = -10;
        MyObj.position.x = 0;
        MyObj.position.y = -5;
        MyObj.rotation.y -= 0.002;
        // MyObj.rotation.z += 0.002;
        // MyObj.rotation.x += 0.002;

        renderer.render(scene, camera);
    } 

    window.addEventListener( 'resize', () => {
        w = container.offsetWidth;
        h = container.offsetHeight;
        camera.aspect = w/h;
        camera.updateProjectionMatrix();
        renderer.setSize(w,h);
    }, false );

    render();
}
